<?php

namespace App\Http\Controllers\Backend\Manageuser;

use App\Helpers\LoginAccess;
use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Manageuser\Role\RoleSr;
use App\Http\Requests\Manageuser\Role\RoleUr;
use App\Models\Managemenu\Menu;
use Cviebrock\EloquentSluggable\Services\SlugService;

class RolesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roles = Role::search(request(['search']))
      ->select(['id', 'sr', 'name', 'bg', 'text', 'description', 'slug'])
      ->with(['menus'])
      ->orderby('sr', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.manageuser.roles.index', [
      'title' => 'Semua data role',
      'roles' => $roles
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $menus = Menu::select('name')->orderby('sm', 'asc')->get();

    return view('backend.manageuser.roles.create', [
      'title' => 'Create data role',
      'menus' => $menus
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(RoleSr $request)
  {
    $datastore = $request->validated();

    Role::create($datastore);

    Alert::success(
      'success',
      'Data role! berhasil di tambahkan.'
    );

    return redirect()->route('roles.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Role $role)
  {
    return view('backend.manageuser.roles.show', [
      'title' => 'Detail data role',
      'role' => $role
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Role $role)
  {
    return view('backend.manageuser.roles.edit', [
      'title' => 'Edit data user',
      'role' => $role
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(RoleUr $request, Role $role)
  {
    $dataupdate = $request->validated();

    if (
      $request->name != $role->name ||
      $request->slug != $role->slug
    ) {
      $rules = [
        'name' => 'unique:roles,name' . $role->id,
        'slug' => 'unique:roles,slug' . $role->id,
      ];

      $messages = [
        'name.unique' => 'Role..name! sudah terdaptar',
        'slug.unique' => 'Role..slug! sudah terdaptar',
      ];

      $request->validate($rules, $messages);
    }

    $role->update($dataupdate);

    Alert::success(
      'success',
      'Data role! berhasil di update.'
    );

    return redirect()->route('roles.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role)
  {
    if (in_array($role->name, ['Owner', 'Super Admin'])) {
      Alert::warning(
        'Oops...',
        'Data role! tidak bisa di delete.'
      );

      return redirect()->route('roles.index');
    }

    Role::destroy($role->id);

    Alert::success(
      'success',
      'Data role! berhasil di delete.'
    );

    return redirect()->route('roles.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Role::class,
      'slug',
      $request->name
    );

    return response()->json(['slug' => $slug]);
  }
}
