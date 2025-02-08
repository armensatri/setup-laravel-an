<?php

namespace App\View\Components\Backend\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonCreateData extends Component
{
  public $buttonName;

  public function __construct($buttonName)
  {
    $this->buttonName = $buttonName;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.button.button-create-data');
  }
}
