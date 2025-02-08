<?php

namespace App\View\Components\Backend\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonCreate extends Component
{
  public $route;
  public $buttonName;

  public function __construct($route, $buttonName)
  {
    $this->route = $route;
    $this->buttonName = $buttonName;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.button.button-create');
  }
}
