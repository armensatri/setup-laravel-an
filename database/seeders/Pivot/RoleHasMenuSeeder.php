<?php

namespace Database\Seeders\Pivot;

use App\Models\Managemenu\Menu;
use App\Models\Manageuser\Role;
use Illuminate\Database\Seeder;

class RoleHasMenuSeeder extends Seeder
{
  public function run(): void
  {
    $roles = Role::whereIn('name', [
      'owner',
      'superadmin',
      'admin',
      'member'
    ])->get()->keyBy('name');

    $menus = Menu::whereIn('name', [
      'owner',
      'superadmin',
      'admin',
      'member',
      'account',
      'manageaccess',
      'managedata',
      'manageuser',
      'managemenu'
    ])->get()->keyBy('name');

    // Daftar role dan menu yang terkait
    $roleMenus = [
      'owner' => [
        'owner',
        'account',
        'manageaccess',
        'managedata',
        'manageuser',
        'managemenu'
      ],

      'superadmin' => [
        'superadmin',
        'account',
        'manageaccess',
        'managedata',
        'manageuser',
        'managemenu'
      ],

      'admin' => [
        'admin',
        'account'
      ],

      'member' => [
        'member',
        'account'
      ],
    ];

    foreach ($roleMenus as $roleName => $menuNames) {
      if (isset($roles[$roleName])) {
        $roles[$roleName]->menus()->attach(
          collect($menuNames)->mapWithKeys(fn($menu) => [$menus[$menu]->id => []])
        );
      }
    }
  }
}
