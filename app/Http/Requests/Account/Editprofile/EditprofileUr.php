<?php

namespace App\Http\Requests\Account\Editprofile;

use Illuminate\Foundation\Http\FormRequest;

class EditprofileUr extends FormRequest
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

      'image' => [
        'image',
        'max:2048'
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

      'image.image' => 'User..image! file yang di upload bukan image',
      'image.max' => 'User..image! ukuran image maksimal 2 mb',
    ];
  }
}
