<?php

namespace App\View\Components\Random\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowImage extends Component
{
  public $name;
  public $asset;
  public $assetDefault;

  public function __construct(
    $name,
    $asset,
    $assetDefault
  ) {
    $this->name = $name;
    $this->asset = $asset;
    $this->assetDefault = $assetDefault;
  }

  public function render(): View|Closure|string
  {
    return view('components.random.backend.show.show-image');
  }
}
