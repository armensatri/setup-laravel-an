<?php

namespace Database\Seeders\Pivot;

use Illuminate\Database\Seeder;
use App\Models\Manageuser\Role;
use App\Models\Managemenu\Submenu;

class RoleHasSubmenuSeeder extends Seeder
{
  public function run(): void
  {
    // Ambil semua role sekaligus
    $roles = Role::whereIn('name', [
      'owner',
      'superadmin',
      'admin',
      'member'
    ])->get()->keyBy('name');

    // Ambil semua submenu sekaligus
    $submenus = Submenu::whereIn('slug', [
      'profile',
      'edit-profile',
      'change-password',

      'ma-menu',
      'ma-submenu',
      'ma-permission',

      'data',

      'users',
      'roles',
      'permissions',

      'menus',
      'submenus'
    ])->get()->keyBy('slug');

    $roleSubmenus = [
      'owner' => [
        'profile',
        'edit-profile',
        'change-password',

        'ma-menu',
        'ma-submenu',
        'ma-permission',

        'data',

        'users',
        'roles',
        'permissions',

        'menus',
        'submenus'
      ],

      'superadmin' => [
        'profile',
        'edit-profile',
        'change-password',

        'ma-menu',
        'ma-submenu',
        'ma-permission',

        'data',

        'users',
        'roles',
        'permissions',

        'menus',
        'submenus'
      ],

      'admin' => [
        'profile',
        'edit-profile',
        'change-password'
      ],

      'member' => [
        'profile',
        'edit-profile',
        'change-password'
      ],
    ];

    foreach ($roleSubmenus as $roleName => $submenuSlugs) {
      if (isset($roles[$roleName])) {
        $roles[$roleName]->submenus()->attach(
          collect($submenuSlugs)->mapWithKeys(fn($slug) => [$submenus[$slug]->id => []])
        );
      }
    }
  }
}
