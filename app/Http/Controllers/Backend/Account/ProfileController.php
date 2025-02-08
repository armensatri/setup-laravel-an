<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function profile()
  {
    return view('backend.account.profile', [
      'title' => 'Account profile'
    ]);
  }
}
