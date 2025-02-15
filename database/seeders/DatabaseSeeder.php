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

use Database\Seeders\Pivot\{
  RoleHasMenuSeeder,
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
      RoleHasMenuSeeder::class,
    ]);
  }
}
