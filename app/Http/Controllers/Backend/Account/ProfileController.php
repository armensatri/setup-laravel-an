<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use App\Helpers\SubmenuAccess;
use App\Helpers\PermissionAccess;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function __construct()
  {
    SubmenuAccess::check();
  }

  public function index()
  {
    $user = Auth::user();

    return view('backend.account.profile.index', [
      'title' => 'Profile',
      'user' => $user
    ]);
  }
}
