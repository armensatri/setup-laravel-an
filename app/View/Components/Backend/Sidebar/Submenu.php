<?php

namespace App\View\Components\Backend\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Submenu extends Component
{
  public $route;
  public $active;
  public $subMenu;
  public $icon;

  public function __construct(
    $route,
    $active,
    $subMenu,
    $icon,
  ) {
    $this->route = $route;
    $this->active = $active;
    $this->subMenu = $subMenu;
    $this->icon = $icon;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.sidebar.submenu');
  }
}
