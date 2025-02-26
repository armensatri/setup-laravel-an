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
        'name' => 'superadmin',
        'slug' => 'superadmin',
        'description' => 'menu super admin'
      ],

      [
        'sm' => 3,
        'name' => 'admin',
        'slug' => 'admin',
        'description' => 'menu admin'
      ],

      [
        'sm' => 4,
        'name' => 'member',
        'slug' => 'member',
        'description' => 'menu member'
      ],

      [
        'sm' => 5,
        'name' => 'account',
        'slug' => 'account',
        'description' => 'menu account'
      ],

      [
        'sm' => 6,
        'name' => 'manageaccess',
        'slug' => 'manageaccess',
        'description' => 'menu manage access'
      ],

      [
        'sm' => 7,
        'name' => 'managedata',
        'slug' => 'managedata',
        'description' => 'menu monitoring data'
      ],

      [
        'sm' => 8,
        'name' => 'manageuser',
        'slug' => 'manageuser',
        'description' => 'menu access user'
      ],

      [
        'sm' => 9,
        'name' => 'managemenu',
        'slug' => 'managemenu',
        'description' => 'menu access menu'
      ],
    ];

    foreach ($menus as $menu) {
      Menu::create($menu);
    }
  }
}
