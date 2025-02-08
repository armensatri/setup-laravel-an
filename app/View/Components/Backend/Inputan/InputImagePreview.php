<?php

namespace App\View\Components\Backend\Inputan;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputImagePreview extends Component
{
  public $labelFor;
  public $labelName;
  public $image;

  public function __construct(
    $labelFor,
    $labelName,
    $image
  ) {
    $this->labelFor = $labelFor;
    $this->labelName = $labelName;
    $this->image = $image;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.inputan.input-image-preview');
  }
}
