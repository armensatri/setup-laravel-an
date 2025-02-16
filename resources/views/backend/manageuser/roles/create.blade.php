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
          <form action="{{ route('roles.store') }}"
            method="POST">
            @csrf

            <div class="app-cse-border">
              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Role..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  value-default=""
                  error="name"
                  placeholder="Masukkan nama role"
                />

                <x-input
                  label-for="slug"
                  label-name="Role..slug"
                  type="text"
                  id="slug"
                  name="slug"
                  value-old="slug"
                  value-default=""
                  error="slug"
                  placeholder="Masukkan slug role"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="sr"
                  label-name="Role..sr"
                  type="text"
                  id="sr"
                  name="sr"
                  value-old="sr"
                  value-default=""
                  error="sr"
                  placeholder="Masukkan sorting role"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="bg"
                  label-name="Role..bg"
                  type="text"
                  id="bg"
                  name="bg"
                  value-old="bg"
                  value-default=""
                  error="bg"
                  placeholder="Masukkan background role, ex : red-200"
                />

                <x-input
                  label-for="text"
                  label-name="Role..text"
                  type="text"
                  id="text"
                  name="text"
                  value-old="text"
                  value-default=""
                  error="text"
                  placeholder="Masukkan color text role, ex : red-800"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-textarea
                  label-for="description"
                  label-name="Role..description"
                  id="description"
                  name="description"
                  value-old="description"
                  value-default=""
                  error="description"
                  placeholder="Masukkan description role"
                />
              </div>

              <div class="gap-8 md:flex"> <!-- Hapus mx-auto -->
                <div class="w-full py-2">
                  <div class="flex ml-1 justify-start gap-1.5">
                    <label for="menu_id" class="block mb-1.5 text-base font-medium text-green-700">
                      Role..menu
                    </label>
                  </div>

                  <div class="border border-gray-300 rounded-2xl">
                    <div class="p-4 grid h-[200px] grid-cols-1
                      sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4
                      gap-x-6 mt-2 overflow-y-scroll">
                      {{-- @foreach ($menus as $menu) --}}
                        <div class="flex">
                          <input id="disabled-checkbox"
                            type="checkbox"
                            value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                          />

                          <label for="disabled-checkbox"
                            class="text-sm font-medium text-gray-700 ms-2 dark:text-gray-500">
                            Disabled checkbox
                          </label>
                        </div>
                      {{-- @endforeach --}}
                    </div>
                  </div>
                </div>
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

  <script>
    const inputname = document.querySelector("#name");
    const slug = document.querySelector("#slug");

    inputname.addEventListener("change", function () {
      fetch("/roles/slug?name=" + inputname.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
    });
  </script>
@endsection
