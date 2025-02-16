<?php

namespace Database\Seeders\Manageuser;

use App\Models\Manageuser\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run(): void
  {
    $users = [
      [
        'name' => 'Armen Satri',
        'username' => 'armensatri',
        'email' => 'armensatri@gmail.com',
        'password' => bcrypt('123qwe'),
        'role_id' => 1
      ],

      [
        'name' => 'Super Admin',
        'username' => 'superadmin',
        'email' => 'superadmin@gmail.com',
        'password' => bcrypt('123qwe'),
        'role_id' => 2
      ],
    ];

    foreach ($users as $user) {
      User::create($user);
    }
  }
}
