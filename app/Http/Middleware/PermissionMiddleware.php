<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PermissionMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   * @param string|null $permission
   * @param string|null $guard
   * @return mixed
   */
  public function handle(Request $request, Closure $next, $permission = null, $guard = null)
  {
    $authGuard = app('auth')->guard($guard);

    // Jika user belum login, redirect ke login
    if ($authGuard->guest()) {
      return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $user = $authGuard->user();

    // Ambil permission dari parameter middleware atau dari nama route
    if (!is_null($permission)) {
      $permissions = is_array($permission) ? $permission : explode('|', $permission);
    } else {
      $routeName = $request->route()->getName();
      if (!$routeName) {
        return redirect()->route('blocked')->with('error', 'Route tidak ditemukan.');
      }
      $permissions = [$routeName]; // Gunakan nama route sebagai permission
    }

    // Cek apakah salah satu role user memiliki permission ini
    foreach ($user->roles as $role) {
      if ($role->hasPermission($permissions)) {
        return $next($request);
      }
    }

    // Jika tidak memiliki permission, redirect ke halaman blocked
    return redirect()->route('blocked')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
  }
}
