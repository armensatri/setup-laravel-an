<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
  public function handle(Request $request, Closure $next)
  {
    $user = Auth::user();

    // Jika user tidak ditemukan
    if (!$user) {
      return redirect()->route('blocked')->with('error', 'User tidak ditemukan.');
    }

    // Jika user tidak memiliki role
    if (!$user->role) {
      return redirect()->route('blocked')->with('error', 'Anda tidak memiliki akses.');
    }

    $role = $user->role;
    $permissions = $role->permissions;

    // Jika role tidak memiliki permission
    if ($permissions->isEmpty()) {
      return redirect()->route('blocked')->with('error', 'Anda tidak memiliki izin.');
    }

    // Cek apakah role memiliki izin ke route saat ini
    if (!$permissions->contains('name', $request->route()->getName())) {
      return redirect()->route('blocked')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }

    return $next($request);
  }
}
