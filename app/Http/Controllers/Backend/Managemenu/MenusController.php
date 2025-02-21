<?php

namespace App\Http\Controllers\Backend\Managemenu;

use App\Helpers\RandomUrl;
use App\Helpers\LoginAccess;
use Illuminate\Http\Request;
use App\Models\Managemenu\Menu;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Managemenu\Menu\MenuSr;
use App\Http\Requests\Managemenu\Menu\MenuUr;
use Cviebrock\EloquentSluggable\Services\SlugService;

class MenusController extends Controller
{
  // public function __construct()
  // {
  //   SubmenuAccess::check();
  // }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $menus = Menu::search(request(['search']))
      ->select(['id', 'sm', 'name', 'description', 'url'])
      ->with(['submenus', 'roles'])
      ->orderby('sm', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.managemenu.menus.index', [
      'title' => 'Semua data menu',
      'menus' => $menus
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.managemenu.menus.create', [
      'title' => 'Create data menu',
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(MenuSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = $request->input('url')
      ?: RandomUrl::GenerateUrl();

    Menu::create($datastore);

    Alert::success(
      'success',
      'Data menu! berhasil di tambahkan.'
    );

    return redirect()->route('menus.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Menu $menu)
  {
    return view('backend.managemenu.menus.show', [
      'title' => 'Detail data menu',
      'menu' => $menu
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Menu $menu)
  {
    return view('backend.managemenu.menus.edit', [
      'title' => 'Edit data menu',
      'menu' => $menu
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(MenuUr $request, Menu $menu)
  {
    $dataupdate = $request->validated();

    if (
      $request->name != $menu->name ||
      $request->slug != $menu->slug
    ) {
      $rules = [
        'name' => 'unique:menus,name' . $menu->id,
        'slug' => 'unique:menus,slug' . $menu->id,
      ];

      $messages = [
        'name.unique' => 'Menu..name! sudah terdaptar',
        'slug.unique' => 'Menu..slug! sudah terdaptar',
      ];

      $request->validate($rules, $messages);
    }

    $menu->update($dataupdate);

    Alert::success(
      'success',
      'Data menu! berhasil di update.'
    );

    return redirect()->route('menus.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Menu $menu)
  {
    if (in_array($menu->name, [
      'account',
      'manage data',
      'manage user',
      'manage menu'
    ])) {
      Alert::warning(
        'Oops...',
        'Data menu! tidak bisa di delete.'
      );

      return redirect()->route('menus.index');
    }

    Menu::destroy($menu->id);

    Alert::success(
      'success',
      'Data menu! berhasil di delete.'
    );

    return redirect()->route('menus.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Menu::class,
      'slug',
      $request->name
    );

    return response()->json(['slug' => $slug]);
  }
}
