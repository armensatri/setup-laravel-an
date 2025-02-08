<?php

namespace App\View\Components\Backend\Error;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Message extends Component
{
  public $error;

  public function __construct($error)
  {
    $this->error = $error;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.error.message');
  }
}
