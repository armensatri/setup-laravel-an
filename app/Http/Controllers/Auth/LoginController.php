<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Auth\Login\LoginSr;

class LoginController extends Controller
{
  public function index()
  {
    return view('auth.login.index', [
      'title' => 'Login'
    ]);
  }

  public function store(LoginSr $request)
  {
    $datastore = $request->validated();

    $user = User::where('email', $datastore['email'])->first();

    if ($user && $user->is_active === 0) {
      Alert::warning(
        'warning',
        'Akun anda belum di aktifkan! silahkan cek email anda'
      );

      return redirect()->route('login');
    }

    if (Auth::attempt($datastore)) {
      $request->session()->regenerate();

      $maproutes = [
        'Owner' => 'owner',
        'Super Admin' => 'superadmin',
        'Admin' => 'admin',
        'Member' => 'member'
      ];

      $role = Auth::user()->role->name ?? null;
      $route = $maproutes[$role] ?? null;

      if ($route) {
        return redirect()->route($route);
      } else {
        Alert::error(
          'Error',
          'Anda tidak memiliki akses'
        );

        return redirect()->route('login');
      }
    } else {
      Alert::error(
        'error',
        'Login gagal! email atau password salah'
      );

      return redirect()->route('login');
    }
  }
}
