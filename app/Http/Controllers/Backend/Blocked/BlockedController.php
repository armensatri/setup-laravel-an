<?php

namespace App\Http\Controllers\Backend\Blocked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlockedController extends Controller
{
  public function index()
  {
    return view('backend.blocked.index', [
      'title' => 'Access blocked'
    ]);
  }
}
