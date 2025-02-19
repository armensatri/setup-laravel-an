<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Backend\Error\Message;
use App\View\Components\Backend\Pagination\Pagination;

use App\View\Components\Backend\Sidebar\{
  Menu,
  Submenu
};

use App\View\Components\Backend\Table\{
  Backup,
  Description,
  Draft,
  Indexs,
  Refresh,
  Search,
  TdAction,
  TdImage,
  TdVar,
  TdVarBg,
  TdVarWidth,
  Th,
  ThAction,
  RoleAccess,
};

use App\View\Components\Backend\Button\{
  ButtonCreate,
  ButtonCreateData,
  ButtonEditData,
};

use App\View\Components\Backend\Inputan\{
  Input,
  InputImage,
  InputImagePreview,
  InputSelect,
  InputTextarea,
};

class BackendServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    // ERROR
    Blade::component('message', Message::class);

    // SIDEBAR
    Blade::component('menu', Menu::class);
    Blade::component('submenu', Submenu::class);

    // TABLE
    Blade::component('description', Description::class);
    Blade::component('refresh', Refresh::class);
    Blade::component('search', Search::class);
    Blade::component('backup', Backup::class);
    Blade::component('draft', Draft::class);
    Blade::component('indexs', Indexs::class);
    Blade::component('th', Th::class);
    Blade::component('td-var', TdVar::class);
    Blade::component('td-var-width', TdVarWidth::class);
    Blade::component('td-image', TdImage::class);
    Blade::component('td-action', TdAction::class);
    Blade::component('th-action', ThAction::class);
    Blade::component('td-var-bg', TdVarBg::class);
    Blade::component('role-access', RoleAccess::class);

    // BUTTON
    Blade::component('button-create', ButtonCreate::class);
    Blade::component('button-create-data', ButtonCreateData::class);
    Blade::component('button-edit-data', ButtonEditData::class);

    // PAGINATION
    Blade::component('pagination', Pagination::class);

    // INPUTAN
    Blade::component('input', Input::class);
    Blade::component('input-select', InputSelect::class);
    Blade::component('input-textarea', InputTextarea::class);
    Blade::component('input-image', InputImage::class);
    Blade::component('input-image-preview', InputImagePreview::class);
  }
}
