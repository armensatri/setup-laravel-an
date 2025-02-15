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
    $admin = Role::where('name', 'Admin')->first();
    $member = Role::where('name', 'Member')->first();

    $account = Menu::where('name', 'account')->first();
    $managedata = Menu::where('name', 'manage data')->first();
    $manageuser = Menu::where('name', 'manage user')->first();
    $managemenu = Menu::where('name', 'manage menu')->first();

    $owner->menus()->attach([
      $account->id => [
        'role' => $owner->name,
        'menu' => $account->name
      ],
      $managedata->id => [
        'role' => $owner->name,
        'menu' => $managedata->name
      ],
      $manageuser->id => [
        'role' => $owner->name,
        'menu' => $manageuser->name
      ],
      $managemenu->id => [
        'role' => $owner->name,
        'menu' => $managemenu->name
      ],
    ]);

    $superadmin->menus()->attach([
      $account->id => [
        'role' => $superadmin->name,
        'menu' => $account->name
      ],
      $managedata->id => [
        'role' => $superadmin->name,
        'menu' => $managedata->name
      ],
      $manageuser->id => [
        'role' => $superadmin->name,
        'menu' => $manageuser->name
      ],
      $managemenu->id => [
        'role' => $superadmin->name,
        'menu' => $managemenu->name
      ],
    ]);

    $admin->menus()->attach([
      $account->id => [
        'role' => $admin->name,
        'menu' => $account->name
      ],
      $managemenu->id => [
        'role' => $admin->name,
        'menu' => $managemenu->name
      ],
    ]);

    $member->menus()->attach([
      $account->id => [
        'role' => $member->name,
        'menu' => $account->name
      ],
    ]);
  }
}
