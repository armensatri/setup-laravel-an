<?php

namespace App\Models\Manageuser;

use App\Models\Manageuser\User;
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
