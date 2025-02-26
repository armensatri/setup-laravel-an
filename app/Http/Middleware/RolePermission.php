<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolePermission
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, $permissionName)
  {
    if (!Auth::check()) {
      return redirect()->route('login');
    }

    $roleId = Auth::user()->role_id;

    // Cek apakah role memiliki permission tertentu
    $hasAccess = DB::table('role_has_permission')
      ->join('permissions', 'role_has_permission.permission_id', '=', 'permissions.id')
      ->where('role_has_permission.role_id', $roleId)
      ->where('permissions.name', $permissionName)
      ->exists();

    if (!$hasAccess) {
      return redirect()->route('blocked'); // Redirect jika tidak memiliki akses
    }

    return $next($request);
  }
}
