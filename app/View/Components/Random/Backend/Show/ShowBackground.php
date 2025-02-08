<?php

namespace App\View\Components\Random\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowBackground extends Component
{
  public $name;
  public $text;
  public $bg;
  public $var;

  public function __construct(
    $name,
    $text,
    $bg,
    $var,
  ) {
    $this->name = $name;
    $this->text = $text;
    $this->bg = $bg;
    $this->var = $var;
  }

  public function render(): View|Closure|string
  {
    return view('components.random.backend.show.show-background');
  }
}
