<?php

namespace App\View\Components\Random\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowAction extends Component
{
  public $name;
  public $edit;
  public $delete;

  public function __construct(
    $name,
    $edit,
    $delete,
  ) {
    $this->name = $name;
    $this->edit = $edit;
    $this->delete = $delete;
  }

  public function render(): View|Closure|string
  {
    return view('components.random.backend.show.show-action');
  }
}
