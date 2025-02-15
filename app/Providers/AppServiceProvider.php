<?php

namespace App\Providers;

use App\Models\Managemenu\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  // public function boot(): void
  // {
  //   $role_id = session('role_id');

  //   $menus = Menu::with('submenus')
  //     ->join('role_has_menu', 'menus.id', '=', 'role_has_menu.menu_id')
  //     ->where('role_has_menu.role_id', $role_id)
  //     ->select('menus.*')
  //     ->get();

  //   View::share('menus', $menus);
  // }

  public function boot()
  {
    view()->composer('*', function ($view) {
      $role_id = session('role_id');

      $menus = DB::table('menus')
        ->join('role_has_menu', 'menus.id', '=', 'role_has_menu.menu_id')
        ->where('role_has_menu.role_id', $role_id)
        ->select('menus.*')
        ->get();

      $menusWithSubmenus = $menus->map(function ($menu) {
        $submenus = DB::table('submenus')
          ->where('menu_id', $menu->id)
          ->get();

        $menu->submenus = $submenus;
        return $menu;
      });

      $view->with('menus', $menusWithSubmenus);
    });
  }
}
