<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
  public function index()
  {
    return view('backend.account.profile.index', [
      'title' => 'Profile'
    ]);
  }
}
