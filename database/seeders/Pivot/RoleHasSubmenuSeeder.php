<?php

namespace Database\Seeders\Pivot;

use Illuminate\Database\Seeder;
use App\Models\Manageuser\Role;
use App\Models\Managemenu\Submenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleHasSubmenuSeeder extends Seeder
{
  public function run(): void
  {
    $owner = Role::where('name', 'owner')->first();
    $superadmin = Role::where('name', 'superadmin')->first();
    $admin = Role::where('name', 'admin')->first();
    $member = Role::where('name', 'member')->first();

    $submenu_profile = Submenu::where('slug', 'profile')->first();
    $submenu_edit_profile = Submenu::where('slug', 'edit-profile')->first();
    $submenu_change_password = Submenu::where('slug', 'change-password')->first();

    $submenu_data = Submenu::where('slug', 'data')->first();

    $submenu_users = Submenu::where('slug', 'users')->first();
    $submenu_roles = Submenu::where('slug', 'roles')->first();
    $submenu_permissions = Submenu::where('slug', 'permissions')->first();

    $submenu_menus = Submenu::where('slug', 'menus')->first();
    $submenu_submenus = Submenu::where('slug', 'submenus')->first();

    $owner->submenus()->attach([
      $submenu_profile->id => [],
      $submenu_edit_profile->id => [],
      $submenu_change_password->id => [],

      $submenu_data->id => [],

      $submenu_users->id => [],
      $submenu_roles->id => [],
      $submenu_permissions->id => [],

      $submenu_menus->id => [],
      $submenu_submenus->id => [],
    ]);

    $superadmin->submenus()->attach([
      $submenu_profile->id => [],
      $submenu_edit_profile->id => [],
      $submenu_change_password->id => [],

      $submenu_data->id => [],

      $submenu_users->id => [],
      $submenu_roles->id => [],
      $submenu_permissions->id => [],

      $submenu_menus->id => [],
      $submenu_submenus->id => [],
    ]);

    $admin->submenus()->attach([
      $submenu_profile->id => [],
      $submenu_edit_profile->id => [],
      $submenu_change_password->id => [],
    ]);

    $member->submenus()->attach([
      $submenu_profile->id => [],
      $submenu_edit_profile->id => [],
      $submenu_change_password->id => [],
    ]);
  }
}
