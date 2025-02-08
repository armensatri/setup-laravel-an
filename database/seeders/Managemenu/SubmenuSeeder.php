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
        'name' => 'profile',
        'slug' => 'profile',
        'route' => '/account/profile/user',
        'active' => '/account/profile/user*',
        'routename' => 'profile',
        'icon' => '/image/profile.jpg',
        'description' => 'user profile'
      ]
    ];

    foreach ($submenus as $submenu) {
      Submenu::create($submenu);
    }
  }
}
