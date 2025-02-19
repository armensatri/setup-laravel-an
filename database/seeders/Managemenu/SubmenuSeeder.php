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
        'name' => 'dashboard',
        'slug' => 'dashboard',
        'route' => '/owner',
        'active' => 'owner',
        'routename' => '/owner',
        'description' => 'dashboard owner'
      ],

      [
        'menu_id' => 2,
        'ssm' => 1,
        'name' => 'profile',
        'slug' => 'profile',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],

      [
        'menu_id' => 2,
        'ssm' => 2,
        'name' => 'edit profile',
        'slug' => 'edit-profile',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],

      [
        'menu_id' => 2,
        'ssm' => 3,
        'name' => 'change password',
        'slug' => 'change-password',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],

      [
        'menu_id' => 3,
        'ssm' => 1,
        'name' => 'visitor',
        'slug' => 'visitor',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],

      [
        'menu_id' => 3,
        'ssm' => 2,
        'name' => 'device',
        'slug' => 'device',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],

      [
        'menu_id' => 3,
        'ssm' => 3,
        'name' => 'silabus',
        'slug' => 'silabus',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],

      [
        'menu_id' => 3,
        'ssm' => 4,
        'name' => 'statistik',
        'slug' => 'statistik',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],

      [
        'menu_id' => 3,
        'ssm' => 5,
        'name' => 'count data',
        'slug' => 'count-data',
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
      ],

      [
        'menu_id' => 4,
        'ssm' => 1,
        'name' => 'users',
        'slug' => 'users',
        'route' => '/users',
        'active' => 'users',
        'routename' => '/users',
        'description' => 'data users'
      ],

      [
        'menu_id' => 4,
        'ssm' => 2,
        'name' => 'roles',
        'slug' => 'roles',
        'route' => '/roles',
        'active' => 'roles',
        'routename' => '/roles',
        'description' => 'data roles'
      ],

      [
        'menu_id' => 5,
        'ssm' => 1,
        'name' => 'menus',
        'slug' => 'menus',
        'route' => '/menus',
        'active' => 'menus',
        'routename' => '/menus',
        'description' => 'data menus'
      ],

      [
        'menu_id' => 5,
        'ssm' => 2,
        'name' => 'submenus',
        'slug' => 'submenus',
        'route' => '/submenus',
        'active' => 'submenus',
        'routename' => '/submenus',
        'description' => 'data submenus'
      ],
    ];

    foreach ($submenus as $submenu) {
      Submenu::create($submenu);
    }
  }
}
