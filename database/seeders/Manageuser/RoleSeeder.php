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
        'name' => 'Owner',
        'slug' => 'owner',
        'bg' => 'red-200',
        'text' => 'red-800',
        'description' => 'owner system'
      ],

      [
        'sr' => 2,
        'name' => 'Super Admin',
        'slug' => 'super-admin',
        'bg' => 'yellow-200',
        'text' => 'yellow-800',
        'description' => 'boss system'
      ],

      [
        'sr' => 3,
        'name' => 'Admin',
        'slug' => 'admin',
        'bg' => 'green-200',
        'text' => 'green-800',
        'description' => 'administrasi system'
      ],

      [
        'sr' => 4,
        'name' => 'Member',
        'slug' => 'member',
        'bg' => 'slate-200',
        'text' => 'slate-800',
        'description' => 'member biasa'
      ],
    ];

    foreach ($roles as $role) {
      Role::create($role);
    }
  }
}
