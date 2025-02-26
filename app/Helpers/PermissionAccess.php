<?php

namespace App\Helpers;

use App\Models\Managemenu\Submenu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Manageuser\Permission;
use Illuminate\Support\Facades\Redirect;

class PermissionAccess
{
  // public static function check()
  // {
  //   // Pastikan user login
  //   if (!Auth::check()) {
  //     return Redirect::route('login')->send();
  //   }

  //   $role_id = Auth::user()->role_id;

  //   // Ambil segment dari URL
  //   // $permissionName = Permission::all(); // Nama permission

  //   // Cek apakah submenu ada di database

  //   // Cek apakah permission ada di database
  //   $queryPermission = Permission::where('name')->first();

  //   if (!$queryPermission) {
  //     abort(404, 'Permission tidak ditemukan');
  //   }

  //   // Cek apakah role user memiliki akses ke permission ini
  //   $userAccess = DB::table('role_has_permission')
  //     ->where('role_id', $role_id)
  //     ->where('permission_id', $queryPermission->id)
  //     ->exists();

  //   if (!$userAccess) {
  //     return Redirect::route('blocked')->send();
  //   }
  // }

  public static function checkaccesspermission($roleId, $permissionId)
  {
    return DB::table('role_has_permission')
      ->where('role_id', $roleId)
      ->where('permission_id', $permissionId)
      ->exists() ? 'checked' : '';
  }
}
