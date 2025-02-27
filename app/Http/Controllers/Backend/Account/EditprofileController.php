<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\Editprofile\EditprofileUr;
use App\Models\Manageuser\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditprofileController extends Controller
{
  public function index()
  {
    $user = Auth::user();

    return view('backend.account.edit-profile.index', [
      'title' => 'Edit profile',
      'user' => $user
    ]);
  }

  public function update(EditprofileUr $request)
  {
    //
  }
}
