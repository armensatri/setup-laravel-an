<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

use App\View\Components\Random\Backend\Show\{
  ShowAction,
  ShowBackground,
  ShowData,
  ShowImage,
  ShowTextColor,
};

class RandomServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    // SHOW
    Blade::component('show-data', ShowData::class);
    Blade::component('show-image', ShowImage::class);
    Blade::component('show-text-color', ShowTextColor::class);
    Blade::component('show-background', ShowBackground::class);
    Blade::component('show-action', ShowAction::class);
  }
}
