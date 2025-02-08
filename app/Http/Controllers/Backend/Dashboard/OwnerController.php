<?php

namespace App\Http\Controllers\Backend\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
  public function index()
  {
    $owner = Auth::user();

    return view('backend.dashboard.owner', [
      'title' => 'Dashboard owner',
      'owner' => $owner
    ]);
  }
}
