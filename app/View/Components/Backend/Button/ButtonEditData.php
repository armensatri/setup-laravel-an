<?php

namespace App\View\Components\Backend\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonEditData extends Component
{
  public $buttonName;

  public function __construct($buttonName)
  {
    $this->buttonName = $buttonName;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.button.button-edit-data');
  }
}
