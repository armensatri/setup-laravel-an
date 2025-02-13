<?php

namespace App\Http\Controllers\Backend\Managemenu;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Managemenu\Menu;
use App\Models\Managemenu\Submenu;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Managemenu\Submenu\SubmenuSr;
use App\Http\Requests\Managemenu\Submenu\SubmenuUr;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SubmenusController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $submenus = Submenu::search(request(['search', 'menu']))
      ->select(['id', 'menu_id', 'ssm', 'name', 'route', 'active', 'routename', 'is_active', 'url'])
      ->with(['menu'])
      ->orderby('menu_id', 'asc')
      ->paginate(8)
      ->withQueryString();

    return view('backend.managemenu.submenus.index', [
      'title' => 'Semua data submenus',
      'submenus' => $submenus
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Submenu $submenu)
  {
    $menus = Menu::select('id', 'name')
      ->orderby('menu_id', 'asc')
      ->get();

    return view('backend.managemenu.submenus.create', [
      'title' => 'Create data submenu',
      'submenu' => $submenu,
      'menus' => $menus
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(SubmenuSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = $request->input('url')
      ?: RandomUrl::GenerateUrl();

    if ($request->hasFile('image')) {
      $datastore['image'] = $request->file('image')->store(
        '/managemenu/submenus'
      );
    }

    Submenu::create($datastore);

    Alert::success(
      'success',
      'Data submenu! berhasil di tambahkan.'
    );

    return redirect()->route('submenus.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Submenu $submenu)
  {
    return view('backend.managemenu.submenus.show', [
      'title' => 'Detail data submenu',
      'submenu' => $submenu
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Submenu $submenu)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(SubmenuUr $request, Submenu $submenu)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Submenu $submenu)
  {
    //
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
