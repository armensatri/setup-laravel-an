<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Search extends Component
{
  public $search;
  public $placeholder;

  public function __construct($search, $placeholder)
  {
    $this->search = $search;
    $this->placeholder = $placeholder;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table.search');
  }
}
