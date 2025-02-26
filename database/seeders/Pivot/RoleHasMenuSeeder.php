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
    $owner = Role::where('name', 'owner')->first();
    $superadmin = Role::where('name', 'superadmin')->first();
    $admin = Role::where('name', 'admin')->first();
    $member = Role::where('name', 'member')->first();

    $menu_owner = Menu::where('name', 'owner')->first();
    $menu_superadmin = Menu::where('name', 'superadmin')->first();
    $menu_admin = Menu::where('name', 'admin')->first();
    $menu_member = Menu::where('name', 'member')->first();
    $menu_account = Menu::where('name', 'account')->first();
    $menu_manageaccess = Menu::where('name', 'manageaccess')->first();
    $menu_managedata = Menu::where('name', 'managedata')->first();
    $menu_manageuser = Menu::where('name', 'manageuser')->first();
    $menu_managemenu = Menu::where('name', 'managemenu')->first();

    $owner->menus()->attach([
      $menu_owner->id => [],
      $menu_account->id => [],
      $menu_manageaccess->id => [],
      $menu_managedata->id => [],
      $menu_manageuser->id => [],
      $menu_managemenu->id => [],
    ]);

    $superadmin->menus()->attach([
      $menu_superadmin->id => [],
      $menu_account->id => [],
      $menu_manageaccess->id => [],
      $menu_managedata->id => [],
      $menu_manageuser->id => [],
      $menu_managemenu->id => [],
    ]);

    $admin->menus()->attach([
      $menu_admin->id => [],
      $menu_account->id => [],
    ]);

    $member->menus()->attach([
      $menu_member->id => [],
      $menu_account->id => [],
    ]);
  }
}
