<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Auth\Register\RegisterSr;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register.index', [
      'title' => 'Register'
    ]);
  }

  public function store(RegisterSr $request)
  {
    $datastore = $request->validated();

    $role = Role::where('name', 'Member')->first();

    if (!$role) {
      Alert::error('error', 'registrasi! belum di buka');
      return redirect()->back();
    }

    $datastore['role_id'] = $role->id;

    User::create($datastore);

    Alert::success(
      'success',
      'Akun anda telah di buat! login sekarang'
    );

    return redirect()->route('login');
  }
}
