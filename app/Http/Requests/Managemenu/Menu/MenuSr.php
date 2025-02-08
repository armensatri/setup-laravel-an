<?php

namespace App\Http\Requests\Managemenu\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MenuSr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'sm' => [
        'required',
        'numeric'
      ],

      'name' => [
        'required',
        'min:3',
        'max:50',
        'unique:menus,name'
      ],

      'slug' => [
        'required',
        'min:3',
        'max:50',
        'unique:menus,slug'
      ],

      'description' => [
        'required'
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Menu..name! harus di isi',
      'name.numeric' => 'Menu..name! harus angka',

      'name.required' => 'Menu..name! harus di isi',
      'name.min' => 'Menu..name! minimal 3 karakter',
      'name.max' => 'Menu..name! maksimal 50 karakter',
      'name.unique' => 'Menu..name! sudah terdaptar',

      'slug.required' => 'Menu..slug! harus di isi',
      'slug.min' => 'Menu..slug! minimal 3 karakter',
      'slug.max' => 'Menu..slug! maksimal 50 karakter',
      'slug.unique' => 'Menu..slug! sudah terdaptar',

      'description.required' => 'Menu..description! harus di isi',
    ];
  }
}
