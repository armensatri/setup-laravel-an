<?php

namespace App\Http\Requests\Managemenu\Submenu;

use Illuminate\Foundation\Http\FormRequest;

class SubmenuSr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'menu_id' => [
        'required'
      ],

      'ssm' => [
        'required',
        'numeric'
      ],

      'name' => [
        'required',
        'min:3',
        'max:50',
        'unique:submenus,name'
      ],

      'slug' => [
        'required',
        'min:3',
        'max:50',
        'unique:submenus,slug'
      ],

      'route' => [
        'required',
      ],

      'active' => [
        'required'
      ],

      'routename' => [
        'required'
      ],

      'icon' => [
        'image',
        'max:2048'
      ],

      'description' => [
        'required'
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.' => 'User..name!',

      'name.' => 'User..name!',
      'name.' => 'User..name!',

      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',

      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',

      'name.' => 'User..name!',

      'name.' => 'User..name!',

      'name.' => 'User..name!',

      'name.' => 'User..name!',
      'name.' => 'User..name!',

      'name.' => 'User..name!',
    ];
  }
}
