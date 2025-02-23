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
              permission - {{ $permission->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-data
              name="Id"
              :var="$permission->id"
            />

            <x-show-data
              name="Create"
              :var="$permission->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Update"
              :var="$permission->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Publish"
              :var="$permission->created_at->diffForHumans()"
            />

            <x-show-data
              name="Name"
              :var="$permission->name"
            />

            <x-show-data
              name="Slug"
              :var="$permission->slug"
            />

            <x-show-data
              name="Url"
              :var="$permission->url"
            />

            <x-show-action
              name="Action"
              :edit="route('permissions.edit', $permission->url)"
              :delete="route('permissions.destroy', $permission->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
