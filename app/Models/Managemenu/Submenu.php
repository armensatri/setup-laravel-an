<?php

namespace App\Models\Managemenu;

use App\Helpers\RandomUrl;
use App\Helpers\Searching;
use App\Models\Managemenu\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;

class Submenu extends Model
{
  use Sluggable;

  protected $table = 'submenus';

  protected $fillable = [
    'menu_id',
    'ssm',
    'name',
    'slug',
    'url',
    'route',
    'active',
    'routename',
    'image',
    'is_active',
    'description'
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'name'
      ]
    ];
  }

  public function menu()
  {
    return $this->belongsTo(Menu::class);
  }

  public function roles()
  {
    return $this->belongsToMany(
      Menu::class,
      'role_has_submenu',
      'submenu_id',
      'role_id',
    );
  }

  public function active(): array
  {
    return $this->is_active
      ? ['bg' => 'green-200', 'text' => 'green-800', 'active' => 'active']
      : ['bg' => 'red-200', 'text' => 'red-800', 'active' => '!active'];
  }

  protected static function boot()
  {
    parent::boot();

    static::saving(function ($submenu) {
      if (empty($submenu->url)) {
        do {
          $url = RandomUrl::GenerateUrl();
        } while (Submenu::where('url', $url)->exists());

        $submenu->url = $url;
      }
    });
  }

  public function scopeSearch(Builder $query, array $filters): void
  {
    $fields = ['name'];

    $relations = [
      'menu' => 'name'
    ];

    $query->when(
      $filters['search'] ?? false,
      function ($query, $search) use ($fields, $relations) {
        Searching::applySearch($query, $search, $fields, $relations);
      }
    );
  }
}
