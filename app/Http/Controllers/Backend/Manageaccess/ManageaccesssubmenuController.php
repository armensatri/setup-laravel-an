<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Http\Controllers\Controller;

class ManageaccesssubmenuController extends Controller
{
  public function index()
  {
    $roles = Role::select('id', 'name')
      ->with('menus')
      ->orderby('sr', 'asc')
      ->get();

    return view('backend.manageaccess.submenu.index', [
      'title' => 'Role access submenu',
      'roles' => $roles
    ]);
  }
}
