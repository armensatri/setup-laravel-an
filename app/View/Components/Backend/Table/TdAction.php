<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdAction extends Component
{
  public $id;
  public $show;
  public $edit;
  public $delete;

  public function __construct(
    $id,
    $show,
    $edit,
    $delete,
  ) {
    $this->id = $id;
    $this->show = $show;
    $this->edit = $edit;
    $this->delete = $delete;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-action');
  }
}
