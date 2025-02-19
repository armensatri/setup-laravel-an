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
        'route' => '-',
        'active' => '-',
        'routename' => '-',
        'description' => '-'
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
        'menu_id' => 6,
        'ssm' => 1,
        'name' => 'menus',
        'slug' => 'menus',
        'route' => 'menus',
        'active' => 'menus',
        'routename' => '/menus',
        'description' => 'pengelolahan menu'
      ],

      [
        'menu_id' => 6,
        'ssm' => 2,
        'name' => 'submenus',
        'slug' => 'submenus',
        'route' => 'submenus',
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
