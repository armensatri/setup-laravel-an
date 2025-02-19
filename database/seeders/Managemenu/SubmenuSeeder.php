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
        'menu_id' => 5,
        'ssm' => 1,
        'name' => 'users',
        'slug' => 'users',
        'route' => '/users',
        'active' => 'users',
        'routename' => '/users',
        'description' => 'pengelolahan role'
      ],

      [
        'menu_id' => 5,
        'ssm' => 2,
        'name' => 'roles',
        'slug' => 'roles',
        'route' => '/roles',
        'active' => 'roles',
        'routename' => '/roles',
        'description' => 'pengelolahan user'
      ],

      [
        'menu_id' => 6,
        'ssm' => 1,
        'name' => 'menus',
        'slug' => 'menus',
        'route' => '/menus',
        'active' => 'menus',
        'routename' => '/menus',
        'description' => 'pengelolahan menu'
      ],

      [
        'menu_id' => 6,
        'ssm' => 2,
        'name' => 'submenus',
        'slug' => 'submenus',
        'route' => '/submenus',
        'active' => 'submenus',
        'routename' => '/submenus',
        'description' => 'pengelolahan submenu'
      ],
    ];

    foreach ($submenus as $submenu) {
      Submenu::create($submenu);
    }
  }
}
