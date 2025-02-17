<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Helpers\LoginAccess;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
  public function __construct()
  {
    LoginAccess::check();
  }

  public function index()
  {
    $member = Auth::user();

    return view('backend.dashboard.member', [
      'title' => 'Dashboard member',
      'member' => $member
    ]);
  }
}
