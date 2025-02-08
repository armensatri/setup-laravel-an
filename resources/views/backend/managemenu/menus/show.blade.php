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
        <div class="app-cse-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              menu - {{ $menu->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-data
              name="Id"
              :var="$menu->id"
            />

            <x-show-data
              name="Create"
              :var="$menu->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Update"
              :var="$menu->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Publish"
              :var="$menu->created_at->diffForHumans()"
            />

            <x-show-data
              name="Sorting"
              :var="$menu->sm"
            />

            <x-show-data
              name="Name"
              :var="$menu->name"
            />

            <x-show-data
              name="Slug"
              :var="$menu->slug"
            />

            <x-show-data
              name="Url"
              :var="$menu->url"
            />

            <x-show-data
              name="Description"
              :var="$menu->description"
            />

            <x-show-action
              name="Action"
              :edit="route('menus.edit', $menu->url)"
              :delete="route('menus.destroy', $menu->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
