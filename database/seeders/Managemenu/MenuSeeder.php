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
        'description' => '-'
      ],

      [
        'sm' => 2,
        'name' => 'superadmin',
        'slug' => 'superadmin',
        'description' => '-'
      ],

      [
        'sm' => 3,
        'name' => 'admin',
        'slug' => 'admin',
        'description' => '-'
      ],

      [
        'sm' => 4,
        'name' => 'member',
        'slug' => 'member',
        'description' => '-'
      ],

      [
        'sm' => 5,
        'name' => 'account',
        'slug' => 'account',
        'description' => '-'
      ],

      [
        'sm' => 6,
        'name' => 'managedata',
        'slug' => 'managedata',
        'description' => '-'
      ],

      [
        'sm' => 7,
        'name' => 'manageuser',
        'slug' => 'manageuser',
        'description' => '-'
      ],

      [
        'sm' => 8,
        'name' => 'managemenu',
        'slug' => 'managemenu',
        'description' => '-'
      ],
    ];

    foreach ($menus as $menu) {
      Menu::create($menu);
    }
  }
}
