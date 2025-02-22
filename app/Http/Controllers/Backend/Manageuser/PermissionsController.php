<?php

namespace App\Http\Controllers\Backend\Manageuser;

use Illuminate\Http\Request;
use App\Helpers\SubmenuAccess;
use App\Http\Controllers\Controller;
use App\Models\Manageuser\Permission;
use App\Http\Requests\Manageuser\Permission\PermissionSr;
use App\Http\Requests\Manageuser\Permission\PermissionUr;

class PermissionsController extends Controller
{
  public function __construct()
  {
    SubmenuAccess::check();
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return 'permission';
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PermissionSr $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Permission $permission)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Permission $permission)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PermissionUr $request, Permission $permission)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Permission $permission)
  {
    //
  }
}
