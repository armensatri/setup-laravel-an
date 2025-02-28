<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Account\Editprofile\EditprofileUr;

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

  public function update(EditprofileUr $request, User $user)
  {
    $dataupdate = $request->validated();

    if ($request->username != $user->username) {
      $rules = [
        'username' => 'unique:users,username' . $user->id,
      ];

      $messages = [
        'username.unique' => 'Username sudah terdaftar.',
      ];

      $request->validate($rules, $messages);
    }

    if ($request->hasFile('image')) {
      if ($user->image) {
        Storage::delete($user->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        'manageuser/users',
      );
    }

    $user->update($dataupdate);


    Alert::success(
      'success',
      'Profile! berhasil diupdate.'
    );

    return redirect()->route('profile');
  }
}
