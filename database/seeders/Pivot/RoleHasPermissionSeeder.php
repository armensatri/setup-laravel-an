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
    $roles = [
      'owner',
      'superadmin',
      'admin',
      'member'
    ];

    // Buat Role jika belum ada
    foreach ($roles as $roleName) {
      Role::firstOrCreate(['name' => $roleName]);
    }

    // Definisi permission berdasarkan role
    $rolePermissions = [
      'owner' => [],

      'superadmin' => [],

      'admin' => [],

      'member' => [],
    ];

    // Assign permission ke masing-masing role
    foreach ($rolePermissions as $roleName => $permissions) {
      $role = Role::where('name', $roleName)->first();

      if ($role) {
        // Ambil semua permission berdasarkan nama
        $permissionIds = Permission::whereIn('name', $permissions)->pluck('id');

        // Assign permission ke role
        $role->permissions()->sync($permissionIds);
      }
    }
  }
}
