<?php

namespace App\Http\Requests\Manageuser\Permission;

use Illuminate\Foundation\Http\FormRequest;

class PermissionUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => [
        'required',
      ],

      'slug' => [
        'required',
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Permission..name! harus di isi',
      'slug.required' => 'Permission..slug! harus di isi',
    ];
  }
}
