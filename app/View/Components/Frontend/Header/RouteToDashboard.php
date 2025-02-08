<?php

namespace App\View\Components\Frontend\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RouteToDashboard extends Component
{
  public $route;

  public function __construct($route)
  {
    $this->route = $route;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.header.route-to-dashboard');
  }
}
