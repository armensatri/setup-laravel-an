<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Backend\Blocked\BlockedController;

use App\Http\Controllers\Auth\{
  LoginController,
  LogoutController,
  RegisterController
};

use App\Http\Controllers\Backend\Dashboard\{
  AdminController,
  MemberController,
  OwnerController,
  SuperadminController
};

use App\Http\Controllers\Backend\Manageuser\{
  UsersController,
  RolesController,
  PermissionsController,
};

use App\Http\Controllers\Backend\Managemenu\{
  MenusController,
  SubmenusController,
};

use App\Http\Controllers\Backend\Account\{
  ChangepasswordController,
  ProfileController,
  EditprofileController,
};

use App\Http\Controllers\Backend\Manageaccess\{
  ManageaccessmenuController,
  ManageaccesspermissionController,
  ManageaccesssubmenuController
};

/*---------------------------------------------------------------
| ROUTE AUTH
|---------------------------------------------------------------*/

Route::group(['middleware' => ['guest']], function () {
  Route::controller(LoginController::class)->group(
    function () {
      Route::get('/auth/login', 'index')->name('login');
      Route::post('/auth/login', 'store')->name('login.store');
    }
  );

  Route::controller(RegisterController::class)->group(
    function () {
      Route::get('/auth/register', 'index')->name('register');
      Route::post('/auth/register', 'store')->name('register.store');
    }
  );
});

Route::group(['middleware' => ['auth']], function () {
  Route::controller(LogoutController::class)->group(
    function () {
      Route::post('/auth/logout', 'logout')->name('logout');
    }
  );
});

/*---------------------------------------------------------------
| ROUTE FRONTEND
|---------------------------------------------------------------*/

Route::get('/', [HomeController::class, 'index'])
  ->name('home');

/*---------------------------------------------------------------
| ROUTE DRAFT
|---------------------------------------------------------------*/

Route::group(['middleware' => ['auth']], function () {
  //
});

/*---------------------------------------------------------------
| ROUTE SLUG
|---------------------------------------------------------------*/

Route::group(['middleware' => ['auth']], function () {
  Route::get('/roles/slug', [RolesController::class, 'slug']);
  Route::get('/menus/slug', [MenusController::class, 'slug']);
  Route::get('/submenus/slug', [SubmenusController::class, 'slug']);
  Route::get('/permissions/slug', [PermissionsController::class, 'slug']);
});

/*---------------------------------------------------------------
| ROUTE DASHBOARD
|---------------------------------------------------------------*/

Route::group(['middleware' => 'auth'], function () {
  Route::get('/owner', [OwnerController::class, 'index'])
    ->name('owner');
  Route::get('/superadmin', [SuperadminController::class, 'index'])
    ->name('superadmin');
  Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin');
  Route::get('/member', [MemberController::class, 'index'])
    ->name('member');
});

/*---------------------------------------------------------------
| ROUTE BACKEND
|---------------------------------------------------------------*/

Route::get('/blocked', [BlockedController::class, 'index'])
  ->name('blocked');

Route::group(['middleware' => ['auth', 'permission']], function () {
  Route::get('/roles/access/{id}/{name}', [
    RolesController::class,
    'access'
  ])->name('access');

  Route::post('/roles/changeaccess', [
    RolesController::class,
    'changeaccess'
  ])->name('changeaccess');

  Route::get('/roles/accesssubmenu/{id}/{name}', [
    RolesController::class,
    'accesssubmenu'
  ])->name('accesssubmenu');

  Route::post('/roles/changeaccesssubmenu', [
    RolesController::class,
    'changeaccesssubmenu'
  ])->name('changeaccesssubmenu');

  Route::get('/roles/accesspermission/{id}/{name}', [
    RolesController::class,
    'accesspermission'
  ])->name('accesspermission');

  Route::post('/roles/changeaccesspermission', [
    RolesController::class,
    'changeaccesspermission'
  ])->name('changeaccesspermission');
});


Route::group(['middleware' => ['auth', 'permission']], function () {
  Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile');

  Route::get('/edit-profile', [EditprofileController::class, 'index'])
    ->name('edit-profile');
  Route::post('/edit-profile/edit', [EditprofileController::class, 'update'])
    ->name('edit-profile.update');

  Route::get('/change-password', [ChangepasswordController::class, 'index'])->name('change-password');
});

Route::group(['middleware' => ['auth', 'permission']], function () {
  Route::get('/ma-menu', [ManageaccessmenuController::class, 'index'])
    ->name('ma-menu');
  Route::get('/ma-submenu', [ManageaccesssubmenuController::class, 'index'])
    ->name('ma-submenu');
  Route::get('/ma-permission', [ManageaccesspermissionController::class, 'index'])
    ->name('ma-permission');
});


Route::group(['middleware' => ['auth', 'permission']], function () {
  Route::resources([
    '/users' => UsersController::class,
    '/roles' => RolesController::class,
    '/permissions' => PermissionsController::class,
    '/menus' => MenusController::class,
    '/submenus' => SubmenusController::class,
  ]);
});
