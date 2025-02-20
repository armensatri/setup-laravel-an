<?php

namespace App\Providers;

use App\Models\Managemenu\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    view()->composer('backend.template.sidebar', function ($view) {
      $role_id = Auth::check() ? Auth::user()->role_id : null;

      if (!$role_id) {
        $view->with('menus', collect());
        return;
      }

      $menus = Menu::with('submenus')
        ->join('role_has_menu', 'menus.id', '=', 'role_has_menu.menu_id')
        ->where('role_has_menu.role_id', $role_id)
        ->select('menus.*')
        ->orderBy('menus.sm', 'asc')
        ->get();

      $view->with('menus', $menus);
    });
  }
}
