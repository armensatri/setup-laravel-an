<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Backup extends Component
{
  public $tableName;

  public function __construct($tableName)
  {
    $this->tableName = $tableName;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table.backup');
  }
}
