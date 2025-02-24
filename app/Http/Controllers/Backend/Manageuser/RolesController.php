<?php

namespace App\Http\Controllers\Backend\Manageuser;

use Illuminate\Http\Request;
use App\Helpers\SubmenuAccess;
use App\Models\Managemenu\Menu;
use App\Models\Manageuser\Role;
use App\Models\Managemenu\Submenu;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Manageuser\Role\RoleSr;
use App\Http\Requests\Manageuser\Role\RoleUr;
use App\Models\Manageuser\Permission;
use Cviebrock\EloquentSluggable\Services\SlugService;

class RolesController extends Controller
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
    $menus = Menu::select('id', 'name')
      ->orderby('sm', 'asc')
      ->get();

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

  public function access($id)
  {
    $role = Role::findOrFail($id);

    $menus = Menu::select('id', 'sm', 'name')
      ->orderBy('sm', 'asc')
      ->paginate(25);

    return view('backend.manageuser.roles.access', [
      'title' => 'Role access' . ' ' . $role->name,
      'role' => $role,
      'menus' => $menus
    ]);
  }

  public function changeaccess(Request $request)
  {
    // Ambil data yang dikirimkan dari AJAX
    $roleId = $request->role_id;  // Ambil role_id dari request
    $menuId = $request->menu_id;  // Ambil menu_id dari request

    // Buat array data untuk digunakan dalam query
    $data = [
      'role_id' => $roleId,
      'menu_id' => $menuId
    ];

    // Cek apakah data role_id dan menu_id sudah ada di tabel role_has_menu
    $exists = DB::table('role_has_menu')->where($data)->exists();

    if ($exists) {
      // Jika ada, hapus akses (uncheck)
      DB::table('role_has_menu')->where($data)->delete();
      $message = 'Akses berhasil dihapus!';
    } else {
      // Jika tidak ada, tambahkan akses (check)
      DB::table('role_has_menu')->insert($data);
      $message = 'Akses berhasil ditambahkan!';
    }

    // Kembalikan response JSON ke frontend
    return response()->json(['success' => true, 'message' => $message]);
  }

  public function accesssubmenu($id)
  {
    $role = Role::findOrFail($id);

    $submenus = Submenu::select('id', 'ssm', 'name')
      ->orderBy('menu_id', 'asc')
      ->paginate(25);

    return view('backend.manageuser.roles.accesssubmenu', [
      'title' => 'Role access' . ' ' . $role->name,
      'role' => $role,
      'submenus' => $submenus
    ]);
  }

  public function changeaccesssubmenu(Request $request)
  {
    // Ambil data yang dikirimkan dari AJAX
    $roleId = $request->role_id;  // Ambil role_id dari request
    $submenuId = $request->submenu_id;  // Ambil menu_id dari request

    // Buat array data untuk digunakan dalam query
    $data = [
      'role_id' => $roleId,
      'submenu_id' => $submenuId
    ];

    // Cek apakah data role_id dan menu_id sudah ada di tabel role_has_menu
    $exists = DB::table('role_has_submenu')->where($data)->exists();

    if ($exists) {
      // Jika ada, hapus akses (uncheck)
      DB::table('role_has_submenu')->where($data)->delete();
      $message = 'Akses berhasil dihapus!';
    } else {
      // Jika tidak ada, tambahkan akses (check)
      DB::table('role_has_submenu')->insert($data);
      $message = 'Akses berhasil ditambahkan!';
    }

    // Kembalikan response JSON ke frontend
    return response()->json(['success' => true, 'message' => $message]);
  }

  public function accesspermission($id)
  {
    $role = Role::findOrFail($id);

    $permissions = Permission::select('id', 'name')
      ->orderBy('id', 'asc')
      ->paginate(25);

    return view('backend.manageuser.roles.accesspermission', [
      'title' => 'Role access' . ' ' . $role->name,
      'role' => $role,
      'permissions' => $permissions
    ]);
  }
}
