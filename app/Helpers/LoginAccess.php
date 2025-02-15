<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginAccess
{
  public static function check()
  {
    $session = app('session');
    $redirect = app('redirect');
    $request = app('request');
    $router = app('router');
    $auth = auth();

    // 🚀 Cek session, redirect jika tidak login
    if (!$session->has('email')) {
      return $redirect->route('login')->send();
    }

    // 🔹 Ambil data user & role
    $user = Auth::user();
    $roleId = $user?->role_id;

    // 🔹 Ambil menu & controller dari URL
    $menu = $request->segment(1);

    // 🔹 Cek menu di database
    $menuId = DB::table('menus')->where('name', $menu)->value('id');

    // 🔹 Cek akses role ke menu
    $hasAccess = DB::table('role_has_menu')
      ->where('role_id', $roleId)
      ->where('menu_id', $menuId)
      ->exists();

    // 🚀 Redirect jika akses ditolak
    if (!$hasAccess) {
      return $redirect->route('blocked');
    }
  }
}
