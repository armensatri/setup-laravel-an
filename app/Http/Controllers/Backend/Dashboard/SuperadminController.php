<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Helpers\LoginAccess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
  public function index()
  {
    $superadmin = Auth::user();

    return view('backend.dashboard.superadmin', [
      'title' => 'Dashboard superadmin',
      'superadmin' => $superadmin
    ]);
  }
}
