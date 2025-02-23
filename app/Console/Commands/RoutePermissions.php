<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Manageuser\Permission;
use Illuminate\Support\Facades\Route;

class RoutePermissions extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'permission:cpr';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create permission routes';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $routes = collect(Route::getRoutes())->filter(
      function ($route) {
        return $route->getName() && in_array(
          'web',
          $route->middleware()
        );
      }
    );

    $created = 0;
    $skipped = 0;

    foreach ($routes as $route) {
      $permission = Permission::firstOrCreate([
        'name' => $route->getName(),
      ]);

      if ($permission->wasRecentlyCreated) {
        $this->info(
          "✅ Permission created: " . $route->getName()
        );
        $created++;
      } else {
        $this->warn(
          "⚠ Permission already exists: " . $route->getName()
        );
        $skipped++;
      }
    }

    $this->info(
      "🎉 Permission generation completed.
      Created: $created,
      Skipped: $skipped"
    );
  }
}
