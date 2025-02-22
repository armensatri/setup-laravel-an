<?php

namespace Database\Seeders\Managemenu;

use Illuminate\Database\Seeder;
use App\Models\Managemenu\Submenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubmenuSeeder extends Seeder
{
  public function run(): void
  {
    $submenus = [
      [
        'menu_id' => 1,
        'ssm' => 1,
        'name' => 'ow dashboard',
        'slug' => 'ow-dashboard',
        'route' => '/owner',
        'active' => 'owner',
        'routename' => '/owner',
        'description' => '-'
      ],

      [
        'menu_id' => 2,
        'ssm' => 1,
        'name' => 'sa dashboard',
        'slug' => 'sa-dashboard',
        'route' => '/superadmin',
        'active' => 'superadmin',
        'routename' => '/superadmin',
        'description' => '-'
      ],

      [
        'menu_id' => 3,
        'ssm' => 1,
        'name' => 'ad dashboard',
        'slug' => 'ad-dashboard',
        'route' => '/admin',
        'active' => 'admin',
        'routename' => '/admin',
        'description' => '-'
      ],

      [
        'menu_id' => 4,
        'ssm' => 1,
        'name' => 'me dashboard',
        'slug' => 'me-dashboard',
        'route' => '/member',
        'active' => 'member',
        'routename' => '/member',
        'description' => '-'
      ],

      [
        'menu_id' => 5,
        'ssm' => 1,
        'name' => 'profile',
        'slug' => 'profile',
        'route' => '/profile',
        'active' => 'profile',
        'routename' => '/profile',
        'description' => '-'
      ],
      [
        'menu_id' => 5,
        'ssm' => 2,
        'name' => 'edit profile',
        'slug' => 'edit-profile',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],
      [
        'menu_id' => 5,
        'ssm' => 3,
        'name' => 'change password',
        'slug' => 'change-password',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],

      [
        'menu_id' => 6,
        'ssm' => 1,
        'name' => 'data',
        'slug' => 'data',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],

      [
        'menu_id' => 7,
        'ssm' => 1,
        'name' => 'users',
        'slug' => 'users',
        'route' => '/users',
        'active' => 'users',
        'routename' => '/users',
        'description' => '-'
      ],
      [
        'menu_id' => 7,
        'ssm' => 2,
        'name' => 'roles',
        'slug' => 'roles',
        'route' => '/roles',
        'active' => 'roles',
        'routename' => '/roles',
        'description' => '-'
      ],

      [
        'menu_id' => 8,
        'ssm' => 1,
        'name' => 'menus',
        'slug' => 'menus',
        'route' => '/menus',
        'active' => 'menus',
        'routename' => '/menus',
        'description' => '-'
      ],
      [
        'menu_id' => 8,
        'ssm' => 2,
        'name' => 'submenus',
        'slug' => 'submenus',
        'route' => '/submenus',
        'active' => 'submenus',
        'routename' => '/submenus',
        'description' => '-'
      ],
    ];

    foreach ($submenus as $submenu) {
      Submenu::create($submenu);
    }
  }
}
