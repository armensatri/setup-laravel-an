<?php

namespace App\Http\Controllers\Backend\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
  public function index()
  {
    $member = Auth::user();

    return view('backend.dashboard.member', [
      'title' => 'Dashboard member',
      'member' => $member
    ]);
  }
}
