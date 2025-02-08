<?php

namespace App\Http\Requests\Auth\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginSr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'email' => [
        'required'
      ],

      'password' => [
        'required'
      ],
    ];
  }

  public function messages()
  {
    return [
      'email.required' => 'Email! harus di isi',
      'password.required' => 'Password! harus di isi',
    ];
  }
}
