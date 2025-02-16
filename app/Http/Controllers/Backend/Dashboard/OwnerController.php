<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Helpers\LoginAccess;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
  public function __construct()
  {
    LoginAccess::check();
  }

  public function index()
  {
    $owner = Auth::user();

    return view('backend.dashboard.owner', [
      'title' => 'Dashboard owner',
      'owner' => $owner
    ]);
  }
}
