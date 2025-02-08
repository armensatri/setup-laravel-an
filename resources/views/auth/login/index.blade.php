@extends('auth.template.main')

@section('content-auth')
  <div class="w-full max-w-md p-8 bg-white shadow rounded-3xl md:p-8">
    <div class="text-2xl font-bold text-center text-gray-900">
      {{ $title }}
    </div>

    @if (session()->has('alert'))
      @include('sweetalert::alert')
    @endif

    <form action="{{ route('login.store') }}"
      method="POST"
      class="p-3 space-y-4">
      @csrf

      <div>
        <input type="text"
          id="email"
          name="email"
          placeholder="Masukkan email"
          class="app-auth-inputan"
          value="{{ old('email') }}"
        />
        <x-message error="email"/>
      </div>

      <div>
        <input type="password"
          id="password"
          name="password"
          placeholder="Masukkan password"
          class="app-auth-inputan"
        />
        <x-message error="password"/>
      </div>

      <button type="submit" class="app-button-auth">
        Login to your account
      </button>

      <div class="text-gray-700 app-auth-link">
        belum terdaptar ?
        <a href="{{ route('register') }}"
          class="text-blue-600 underline">
          buat akun
        </a>
      </div>

      <div class="app-auth-link">
        <a href="#"
          class="text-red-600 underline">
          lupa password ?
        </a>
      </div>

      <div class="text-gray-700 app-auth-link">
        back to
        <a href="{{ route('home') }}"
          class="text-blue-600 underline">
          home
        </a>
      </div>
    </form>
  </div>
@endsection
