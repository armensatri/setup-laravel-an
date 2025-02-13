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
              submenu - {{ $submenu->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-data
              name="Id"
              :var="$submenu->id"
            />

            <x-show-data
              name="Create"
              :var="$submenu->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Update"
              :var="$submenu->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Publish"
              :var="$submenu->created_at->diffForHumans()"
            />

            <x-show-data
              name="Menu"
              :var="$submenu->menu->name"
            />

            <x-show-data
              name="Sorting"
              :var="$submenu->ssm"
            />

            <x-show-data
              name="Name"
              :var="$submenu->name"
            />

            <x-show-data
              name="Slug"
              :var="$submenu->slug"
            />

            <x-show-data
              name="Url"
              :var="$submenu->url"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
