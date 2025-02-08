<?php

namespace App\Http\Requests\Managemenu\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MenuUr extends FormRequest
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
      ],

      'slug' => [
        'required',
        'min:3',
        'max:50',
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

      'slug.required' => 'Menu..slug! harus di isi',
      'slug.min' => 'Menu..slug! minimal 3 karakter',
      'slug.max' => 'Menu..slug! maksimal 50 karakter',

      'description.required' => 'Menu..description! harus di isi',
    ];
  }
}
