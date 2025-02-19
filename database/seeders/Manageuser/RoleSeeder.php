<?php

namespace Database\Seeders\Manageuser;

use App\Models\Manageuser\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
  public function run(): void
  {
    $roles = [
      [
        'sr' => 1,
        'name' => 'owner',
        'slug' => 'owner',
        'bg' => 'red-200',
        'text' => 'red-800',
        'description' => 'owner system'
      ],

      [
        'sr' => 2,
        'name' => 'superadmin',
        'slug' => 'superadmin',
        'bg' => 'yellow-200',
        'text' => 'yellow-800',
        'description' => 'boss system'
      ],
    ];

    foreach ($roles as $role) {
      Role::create($role);
    }
  }
}
