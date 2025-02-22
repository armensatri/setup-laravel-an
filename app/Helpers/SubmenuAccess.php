<?php

namespace App\Helpers;

use App\Models\Managemenu\Submenu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SubmenuAccess
{
  public static function check()
  {
    // Pastikan user login
    if (!Auth::check()) {
      return Redirect::route('login')->send();
    }

    $role_id = Auth::user()->role_id;
    $submenu = request()->segment(1); // Ambil segment pertama dari URL

    // Cek apakah submenu ada di database
    $querySubMenu = Submenu::where('name', $submenu)->first();

    if (!$querySubMenu) {
      abort(404, 'Menu tidak ditemukan'); // Tampilkan 404 jika menu tidak ada
    }

    // Cek apakah role user memiliki akses ke submenu ini
    $userAccess = DB::table('role_has_submenu')
      ->where('role_id', $role_id)
      ->where('submenu_id', $querySubMenu->id)
      ->exists();

    if (!$userAccess) {
      return Redirect::route('blocked')->send();
    }
  }

  public static function checkaccesssubmenu($roleId, $submenuId)
  {
    return DB::table('role_has_submenu')
      ->where('role_id', $roleId)
      ->where('submenu_id', $submenuId)
      ->exists() ? 'checked' : '';
  }
}
