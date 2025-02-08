<?php

namespace App\Http\Requests\Manageuser\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUr extends FormRequest
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
        'min:3',
        'max:50'
      ],

      'username' => [
        'required',
        'min:3',
        'max:15',
        'regex:/^[a-z]+$/',
      ],

      'email' => [
        'required',
        'email:dns',
      ],

      'image' => [
        'image',
        'max:2048'
      ],

      'role_id' => [
        'required'
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'User..name! harus di isi',
      'name.min' => 'User..name! minimal 3 karakter',
      'name.max' => 'User..name! maksimal 50 karakter',

      'username.required' => 'User..username! harus di isi',
      'username.min' => 'User..username! minimal 3 karakter',
      'username.max' => 'User..username! maksimal 15 karakter',
      'username.regex' => 'User..username! harus huruf kecil tanpa spasi',

      'email.required' => 'User..email! harus di isi',
      'email.email' => 'User..email! tidak valid',

      'image.image' => 'User..image! file yang di upload bukan image',
      'image.max' => 'User..image! ukuran image maksimal 2 mb',

      'role_id.required' => 'User..role! harus di isi',
    ];
  }
}
