<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Indexs extends Component
{
  public $route;
  public $name;

  public function __construct($route, $name)
  {
    $this->route = $route;
    $this->name = $name;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table.indexs');
  }
}
