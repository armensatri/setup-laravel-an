<?php

namespace App\Http\Requests\Auth\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterSr extends FormRequest
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
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Nama! harus di isi',
      'name.min' => 'Nama! minimal 3 karakter',
      'name.max' => 'Nama! maksimal 50 karakter',

      'username.required' => 'Username! harus di isi',
      'username.min' => 'Username! minimal 3 karakter',
      'username.max' => 'Username! maksimal 15 karakter',
      'username.regex' => 'Username! harus huruf kecil',
      'username.unique' => 'Username! sudah terdaptar',

      'email.required' => 'Email! harus di isi',
      'email.email' => 'Email! tidak valid',
      'email.unique' => 'Email! sudah terdaptar',

      'password.required' => 'Password! harus di isi',
      'password.min' => 'Password! minimal 6 karakter',
      'password.max' => 'Password! maksimal 256 karakter',
      'password.regex' => 'Password! harus huruf dan angka, tanpa spasi',
      'password.same' => 'Password! harus sama dengan password konfirm',

      'passkon.required' => 'Password konfirm! harus di isi',
      'passkon.same' => 'Password konfirm! harus sama dengan password',
    ];
  }
}
