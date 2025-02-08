<?php

namespace App\Providers;

use App\Models\Managemenu\Menu;
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
    $menus = Menu::with('submenus')->get();
    View::share('menus', $menus);
  }
}
