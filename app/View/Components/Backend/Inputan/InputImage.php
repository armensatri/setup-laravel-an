<?php

namespace App\View\Components\Backend\Inputan;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputImage extends Component
{
  public $labelFor;
  public $labelName;
  public $type;
  public $id;
  public $name;
  public $error;

  public function __construct(
    $labelFor,
    $labelName,
    $type,
    $id,
    $name,
    $error,
  ) {
    $this->labelFor = $labelFor;
    $this->labelName = $labelName;
    $this->type = $type;
    $this->id = $id;
    $this->name = $name;
    $this->error = $error;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.inputan.input-image');
  }
}
