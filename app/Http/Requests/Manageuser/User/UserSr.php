<?php

namespace App\Http\Requests\Manageuser\User;

use Illuminate\Foundation\Http\FormRequest;

class UserSr extends FormRequest
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
        'unique:users,username'
      ],

      'email' => [
        'required',
        'email:dns',
        'unique:users,email'
      ],

      'password' => [
        'required',
        'min:6',
        'max:256',
        'regex:/^[a-zA-Z0-9]+$/',
        'same:passkon'
      ],

      'passkon' => [
        'required',
        'same:password'
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
      'username.unique' => 'User..username! sudah terdaptar',

      'email.required' => 'User..email! harus di isi',
      'email.email' => 'User..email! tidak valid',
      'email.unique' => 'User..email! sudah terdaptar',

      'password.required' => 'User..password! harus di isi',
      'password.min' => 'User..password! minimal 6 karakter',
      'password.max' => 'User..password! maksimal 256 karakter',
      'password.regex' => 'User..password! harus huruf dan angka tanpa sapasi',
      'password.same' => 'User..password! harus sama dengan password konfirm',

      'passkon.required' => 'User..password konfirm! harus di isi',
      'passkon.same' => 'User..password konfirm! harus sama dengan password',

      'image.image' => 'User..image! file yang di upload bukan image',
      'image.max' => 'User..image! ukuran image maksimal 2 mb',

      'role_id.required' => 'User..role! harus di isi',
    ];
  }
}
