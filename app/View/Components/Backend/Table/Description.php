<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Description extends Component
{
  public $tableName;
  public $pageData;

  public function __construct($tableName, $pageData)
  {
    $this->tableName = $tableName;
    $this->pageData = $pageData;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table.description');
  }
}
