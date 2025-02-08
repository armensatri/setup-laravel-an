<?php

namespace App\Http\Controllers\Backend\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function index()
  {
    $admin = Auth::user();

    return view('backend.dashboard.admin', [
      'title' => 'Dashboard admin',
      'admin' => $admin
    ]);
  }
}
