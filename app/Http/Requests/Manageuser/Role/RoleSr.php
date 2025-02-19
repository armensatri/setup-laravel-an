<?php

namespace App\Http\Requests\Manageuser\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleSr extends FormRequest
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
        'unique:roles,name'
      ],

      'slug' => [
        'required',
        'min:3',
        'max:50',
        'unique:roles,slug'
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
      'name.unique' => 'Role..name! sudah terdaptar',

      'slug.required' => 'Role..slug! harus di isi',
      'slug.min' => 'Role..slug! minimal 3 karakter',
      'slug.max' => 'Role..slug! maksimal 50 karakter',
      'slug.unique' => 'Role..slug! sudah terdaptar',

      'bg.required' => 'Role..background! harus di isi',

      'text.required' => 'Role..text! harus di isi',

      'description.required' => 'Role..description! harus di isi',
    ];
  }
}
