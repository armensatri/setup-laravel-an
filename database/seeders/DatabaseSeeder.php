<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\Manageuser\{
  UserSeeder,
  RoleSeeder,
};

use Database\Seeders\Managemenu\{
  MenuSeeder,
  SubmenuSeeder
};

class DatabaseSeeder extends Seeder
{
  public function run(): void
  {
    $this->call([
      RoleSeeder::class,
      UserSeeder::class,
      MenuSeeder::class,
      SubmenuSeeder::class,
    ]);
  }
}
