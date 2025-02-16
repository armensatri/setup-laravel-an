<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginAccess
{
  public static function check()
  {
    if (!Session::has('email')) {
      return Redirect::route('login')->send();
    } else {
      $role_id = Auth::user()->role_id;
      $menu = request()->segment(1);

      $queryMenu = DB::table('menu')->where('name', $menu)->first();
      $menu_id = $queryMenu->id;

      $useAccess = DB::table('role_has_menu')
        ->where('role_id', $role_id)
        ->where('menu_id', $menu_id)
        ->exists();

      if (!$useAccess) {
        return Redirect::route('blocked')->send();
      }
    }
  }
}
