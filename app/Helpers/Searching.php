<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

class Searching
{
  /**
   * Apply search filters to a query.
   *
   * @param Builder $query
   * @param string|null $search
   * @param array $fields
   * @param array $relations
   * @return void
   */
  public static function applySearch(
    Builder $query,
    ?string $search,
    array $fields,
    array $relations = []
  ): void {
    $query->where(function ($query) use ($search, $fields, $relations) {
      // Pencarian pada field utama
      foreach ($fields as $field) {
        $query->orWhere($field, 'like', '%' . $search . '%');
      }

      // Pencarian pada relasi
      foreach ($relations as $relation => $relationField) {
        $query->orWhereHas($relation, function ($query) use ($search, $relationField) {
          $query->where($relationField, 'like', '%' . $search . '%');
        });
      }
    });
  }
}
