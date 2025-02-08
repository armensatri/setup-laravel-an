@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-4 mb-2">
        <div class="app-content">
          <div class="app-content-title">
            {{ $title }}
          </div>
        </div>
      </section>

      <section class="w-full px-4 mt-8 mb-5">
        <div class="w-full">
          <form action="{{ route('users.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="app-cse-border">
              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="User..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  value-default=""
                  error="name"
                  placeholder="Masukkan nama user"
                />

                <x-input
                  label-for="username"
                  label-name="User..username"
                  type="text"
                  id="username"
                  name="username"
                  value-old="username"
                  value-default=""
                  error="username"
                  placeholder="Masukkan username user"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="email"
                  label-name="User..email"
                  type="text"
                  id="email"
                  name="email"
                  value-old="email"
                  value-default=""
                  error="email"
                  placeholder="Masukkan email user"
                />

                <x-input-select
                  label-for="role_id"
                  label-name="User..role"
                  id="role_id"
                  name="role_id"
                  :items="$roles"
                  value-old="role_id"
                  value-default=""
                  error="role_id"
                  placeholder="Select role for user"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="password"
                  label-name="User..password"
                  type="password"
                  id="password"
                  name="password"
                  value-old=""
                  value-default=""
                  error="password"
                  placeholder="Masukkan password user"
                />

                <x-input
                  label-for="passkon"
                  label-name="User..password konfirm"
                  type="password"
                  id="passkon"
                  name="passkon"
                  value-old=""
                  value-default=""
                  error="passkon"
                  placeholder="Masukkan password konfirm user"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-image
                  label-for="image"
                  label-name="User..image"
                  type="file"
                  id="image"
                  name="image"
                  error="image"
                />

                <x-input-image-preview
                  label-for="image"
                  label-name="User..preview"
                  :image="$user->image"
                />
              </div>

              <div class="mt-8">
                <x-button-create-data
                  button-name="Create data"
                />
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
@endsection
