<?php

namespace App\Http\Requests\Manageuser\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'sr' => [
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

      'bg' => [
        'required'
      ],

      'text' => [
        'required'
      ],

      'description' => [
        'required'
      ],
    ];
  }

  public function messages()
  {
    return [
      'sr.required' => 'Role..sorting! harus di isi',
      'sr.numeric' => 'Role..sorting! harus angka',

      'name.required' => 'Role..name! harus di isi',
      'name.min' => 'Role..name! minimal 3 karakter',
      'name.max' => 'Role..name! maksimal 50 karakter',

      'slug.required' => 'Role..slug! harus di isi',
      'slug.min' => 'Role..slug! minimal 3 karakter',
      'slug.max' => 'Role..slug! maksimal 50 karakter',

      'bg.required' => 'Role..background! harus di isi',

      'text.required' => 'Role..text! harus di isi',

      'description.required' => 'Role..description! harus di isi',
    ];
  }
}
