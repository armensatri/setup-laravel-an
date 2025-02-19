<?php

namespace Database\Seeders\Managemenu;

use Illuminate\Database\Seeder;
use App\Models\Managemenu\Menu;

class MenuSeeder extends Seeder
{
  public function run(): void
  {
    $menus = [
      [
        'sm' => 1,
        'name' => 'owner',
        'slug' => 'owner',
        'description' => 'menu owner'
      ],

      [
        'sm' => 2,
        'name' => 'account',
        'slug' => 'account',
        'description' => 'menu account user'
      ],

      [
        'sm' => 3,
        'name' => 'managedata',
        'slug' => 'managedata',
        'description' => 'menu monitoring data'
      ],

      [
        'sm' => 4,
        'name' => 'manageuser',
        'slug' => 'manageuser',
        'description' => 'menu access user'
      ],

      [
        'sm' => 5,
        'name' => 'managemenu',
        'slug' => 'managemenu',
        'description' => 'menu access menu dan submenu'
      ],
    ];

    foreach ($menus as $menu) {
      Menu::create($menu);
    }
  }
}
