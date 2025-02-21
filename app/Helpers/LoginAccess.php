<?php

namespace App\Helpers;

use App\Models\Managemenu\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoginAccess
{
  public static function check()
  {
    // Pastikan user login
    if (!Auth::check()) {
      return Redirect::route('login')->send();
    }

    $role_id = Auth::user()->role_id;
    $menu = request()->segment(1); // Ambil segment pertama dari URL

    // Cek apakah menu ada di database
    $queryMenu = Menu::where('name', $menu)->first();

    if (!$queryMenu) {
      abort(404, 'Menu tidak ditemukan'); // Tampilkan 404 jika menu tidak ada
    }

    // Cek apakah role user memiliki akses ke menu ini
    $userAccess = DB::table('role_has_menu')
      ->where('role_id', $role_id)
      ->where('menu_id', $queryMenu->id)
      ->exists();

    if (!$userAccess) {
      return Redirect::route('blocked')->send();
    }
  }

  public static function getDashboardRoute()
  {
    $user = Auth::user();
    if (!$user) return route('home');

    $routes = [
      'owner' => 'owner',
      'superadmin' => 'superadmin',
      'admin' => 'admin',
      'member' => 'member',
    ];

    return $routes[$user->role->name] ?? route('home');
  }

  public static function checkaccess($roleId, $menuId)
  {
    return DB::table('role_has_menu')
      ->where('role_id', $roleId)
      ->where('menu_id', $menuId)
      ->exists() ? 'checked' : '';
  }
}
