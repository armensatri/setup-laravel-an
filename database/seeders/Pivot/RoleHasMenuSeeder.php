<?php

namespace Database\Seeders\Pivot;

use App\Models\Managemenu\Menu;
use App\Models\Manageuser\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleHasMenuSeeder extends Seeder
{
  public function run(): void
  {
    $owner = Role::where('name', 'Owner')->first();
    $superadmin = Role::where('name', 'Super Admin')->first();

    $menuowner = Menu::where('name', 'owner')->first();
    $menusuperadmin = Menu::where('name', 'superadmin')->first();
    $menumanagemenu = Menu::where('name', 'managemenu')->first();

    $owner->menus()->attach([
      $menuowner->id => [
        // 'role' => $owner->name,
        // 'menu' => $menuowner->name
      ],
      $menusuperadmin->id => [
        // 'role' => $owner->name,
        // 'menu' => $menusuperadmin->name
      ],
      $menumanagemenu->id => [
        // 'role' => $owner->name,
        // 'menu' => $menusuperadmin->name
      ],
    ]);

    $superadmin->menus()->attach([
      $menusuperadmin->id => [
        // 'role' => $superadmin->name,
        // 'menu' => $menusuperadmin->name
      ],
    ]);
  }
}
