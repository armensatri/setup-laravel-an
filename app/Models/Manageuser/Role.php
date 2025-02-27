<?php

namespace App\Models\Manageuser;

use App\Models\Manageuser\User;
use App\Models\Managemenu\Menu;
use App\Models\Managemenu\Submenu;
use App\Models\Manageuser\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;

class Role extends Model
{
  use Sluggable;

  protected $table = 'roles';

  protected $fillable = [
    'sr',
    'name',
    'slug',
    'bg',
    'text',
    'description'
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'name'
      ]
    ];
  }

  public function users()
  {
    return $this->hasMany(User::class);
  }

  public function menus()
  {
    return $this->belongsToMany(
      Menu::class,
      'role_has_menu',
      'role_id',
      'menu_id'
    );
  }

  public function submenus()
  {
    return $this->belongsToMany(
      Submenu::class,
      'role_has_submenu',
      'role_id',
      'submenu_id'
    );
  }

  public function permissions()
  {
    return $this->belongsToMany(
      Permission::class,
      'role_has_permission',
      'role_id',
      'permission_id'
    );
  }

  public function hasPermission($permissions)
  {
    return $this->permissions()
      ->whereIn('name', (array) $permissions)
      ->exists();
  }

  public function scopeSearch(Builder $query, array $filters): void
  {
    $fields = ['name'];

    $query->when(
      $filters['search'] ?? false,
      fn($query, $search) =>
      $query->where(function ($query) use ($search, $fields) {
        foreach ($fields as $fields) {
          $query->orWhere($fields, 'like', '%' . $search . '%');
        }
      })
    );
  }
}
