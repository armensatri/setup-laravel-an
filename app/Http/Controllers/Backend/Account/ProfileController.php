<?php

namespace App\Http\Controllers\Backend\Account;

use App\Helpers\PermissionAccess;
use Illuminate\Http\Request;
use App\Helpers\SubmenuAccess;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
  public function __construct()
  {
    SubmenuAccess::check();
  }

  public function index()
  {
    return view('backend.account.profile.index', [
      'title' => 'Profile'
    ]);
  }
}
