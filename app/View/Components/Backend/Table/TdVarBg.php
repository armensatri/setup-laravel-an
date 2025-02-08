<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdVarBg extends Component
{
  public $bg;
  public $text;
  public $var;

  public function __construct(
    $bg,
    $text,
    $var
  ) {
    $this->bg = $bg;
    $this->text = $text;
    $this->var = $var;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-var-bg');
  }
}
