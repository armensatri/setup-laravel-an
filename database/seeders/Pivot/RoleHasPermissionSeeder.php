<?php

namespace Database\Seeders\Pivot;

use App\Models\Manageuser\Role;
use Illuminate\Database\Seeder;
use App\Models\Manageuser\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleHasPermissionSeeder extends Seeder
{
  public function run(): void
  {
    $roles = [
      'owner',
      'superadmin',
      'admin',
      'member'
    ];

    // Buat Role jika belum ada
    foreach ($roles as $roleName) {
      Role::firstOrCreate(
        ['name' => $roleName],
        ['guard_name' => 'web'] // Pastikan sesuai guard
      );
    }

    // Definisi permission berdasarkan role
    $rolePermissions = [
      'owner' => [
        'login',
        'login.store',
        'register',
        'register.store',
        'logout',
        'home',
        'owner',
        'access',
        'changeaccess',
        'accesssubmenu',
        'changeaccesssubmenu',
        'accesspermission',
        'changeaccesspermission',
        'profile',
        'edit-profile',
        'edit-profile.update',
        'change-password',
        'ma-menu',
        'ma-submenu',
        'ma-permission',
        'users.index',
        'users.create',
        'users.store',
        'users.show',
        'users.edit',
        'users.update',
        'users.destroy',
        'roles.index',
        'roles.create',
        'roles.store',
        'roles.show',
        'roles.edit',
        'roles.update',
        'roles.destroy',
        'permissions.index',
        'permissions.create',
        'permissions.store',
        'permissions.show',
        'permissions.edit',
        'permissions.update',
        'permissions.destroy',
        'menus.index',
        'menus.create',
        'menus.store',
        'menus.show',
        'menus.edit',
        'menus.update',
        'menus.destroy',
        'submenus.index',
        'submenus.create',
        'submenus.store',
        'submenus.show',
        'submenus.edit',
        'submenus.update',
        'submenus.destroy'
      ],
      'superadmin' => [
        'login',
        'login.store',
        'register',
        'register.store',
        'logout',
        'home',
        'superadmin',
        'access',
        'changeaccess',
        'accesssubmenu',
        'changeaccesssubmenu',
        'accesspermission',
        'changeaccesspermission',
        'profile',
        'edit-profile',
        'edit-profile.update',
        'change-password',
        'ma-menu',
        'ma-submenu',
        'ma-permission',
        'users.index',
        'users.create',
        'users.store',
        'users.show',
        'users.edit',
        'users.update',
        'users.destroy',
        'roles.index',
        'roles.create',
        'roles.store',
        'roles.show',
        'roles.edit',
        'roles.update',
        'roles.destroy',
        'permissions.index',
        'permissions.create',
        'permissions.store',
        'permissions.show',
        'permissions.edit',
        'permissions.update',
        'permissions.destroy',
        'menus.index',
        'menus.create',
        'menus.store',
        'menus.show',
        'menus.edit',
        'menus.update',
        'menus.destroy',
        'submenus.index',
        'submenus.create',
        'submenus.store',
        'submenus.show',
        'submenus.edit',
        'submenus.update',
        'submenus.destroy'
      ],
      'admin' => [
        'login',
        'login.store',
        'register',
        'register.store',
        'logout',
        'home',
        'admin',
        'profile',
        'edit-profile',
        'edit-profile.update',
        'change-password',
      ],
      'member' => [
        'login',
        'login.store',
        'register',
        'register.store',
        'logout',
        'home',
        'member',
        'profile',
        'edit-profile',
        'edit-profile.update',
        'change-password',
      ],
    ];

    // Assign permission ke masing-masing role
    foreach ($rolePermissions as $roleName => $permissions) {
      $role = Role::where('name', $roleName)->first();

      if (!$role) {
        continue; // Lewati jika role tidak ditemukan
      }

      // Pastikan semua permission sudah ada di database
      foreach ($permissions as $permissionName) {
        Permission::firstOrCreate(
          ['name' => $permissionName],
          ['guard_name' => 'web']
        );
      }

      // Ambil semua permission berdasarkan nama dan urutkan berdasarkan ID ASC
      $permissionIds = Permission::whereIn('name', $permissions)
        ->orderBy('id', 'asc')
        ->pluck('id');

      // Assign permission ke role (gunakan sync untuk mencegah duplikasi)
      $role->permissions()->sync($permissionIds);
    }
  }
}
