<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
  /**
   * Handle an incoming request.
   */
  public function handle(Request $request, Closure $next, $role)
  {
    $user = Auth::user();

    // Cek apakah user sudah login dan memiliki role yang sesuai
    if (!$user || $user->role->name !== $role) {
      abort(403, 'Unauthorized action.');
    }

    return $next($request);
  }
}
