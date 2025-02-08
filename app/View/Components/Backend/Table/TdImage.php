<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdImage extends Component
{
  public $asset;
  public $assetDefault;

  public function __construct($asset, $assetDefault)
  {
    $this->asset = $asset;
    $this->assetDefault = $assetDefault;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-image');
  }
}
