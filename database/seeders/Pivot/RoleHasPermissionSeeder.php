<?php

namespace Database\Seeders\Pivot;

use App\Models\Manageuser\Role;
use Illuminate\Database\Seeder;
use App\Models\Manageuser\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleHasPermissionSeeder extends Seeder
{
  public function run(): void
  {
    $owner = Role::where('name', 'owner')->first();

    $permission_users_index = Permission::where('name', 'users.index')
      ->first();

    if ($owner && $permission_users_index) {
      $owner->permissions()->attach($permission_users_index->id);
    }
  }
}
