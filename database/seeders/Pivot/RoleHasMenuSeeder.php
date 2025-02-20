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
    // $owner = Role::where('name', 'owner')->first();

    // $menuowner = Menu::where('name', 'owner')->first();
    // $menuaccount = Menu::where('name', 'account')->first();
    // $menumanagedata = Menu::where('name', 'managedata')->first();
    // $menumanageuser = Menu::where('name', 'manageuser')->first();
    // $menumanagemenu = Menu::where('name', 'managemenu')->first();

    // $owner->menus()->attach([
    //   $menuowner->id => [
    //     // 'role' => $owner->name,
    //     // 'menu' => $menuowner->name
    //   ],
    //   $menuaccount->id => [
    //     // 'role' => $owner->name,
    //     // 'menu' => $menuowner->name
    //   ],
    //   $menumanageuser->id => [
    //     // 'role' => $owner->name,
    //     // 'menu' => $menuowner->name
    //   ],
    //   $menumanagemenu->id => [
    //     // 'role' => $owner->name,
    //     // 'menu' => $menuowner->name
    //   ],
    // ]);
  }
}
