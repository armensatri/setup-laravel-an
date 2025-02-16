<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Helpers\LoginAccess;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
  public function __construct()
  {
    LoginAccess::check();
  }

  public function index()
  {
    $superadmin = Auth::user();

    return view('backend.dashboard.superadmin', [
      'title' => 'Dashboard superadmin',
      'superadmin' => $superadmin
    ]);
  }
}
