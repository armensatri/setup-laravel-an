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
        'name' => 'account',
        'slug' => 'account',
        'description' => 'menu account user'
      ],

      [
        'sm' => 2,
        'name' => 'manage data',
        'slug' => 'manage-data',
        'description' => 'menu monitoring data'
      ],

      [
        'sm' => 3,
        'name' => 'manage user',
        'slug' => 'manage-user',
        'description' => 'menu pengelolahan access user'
      ],

      [
        'sm' => 4,
        'name' => 'manage menu',
        'slug' => 'manage-menu',
        'description' => 'menu pengelolahan access menu dan submenu'
      ],
    ];

    foreach ($menus as $menu) {
      Menu::create($menu);
    }
  }
}
