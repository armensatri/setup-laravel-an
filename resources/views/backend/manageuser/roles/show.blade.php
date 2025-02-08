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
              role - {{ $role->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-data
              name="Id"
              :var="$role->id"
            />

            <x-show-data
              name="Create"
              :var="$role->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Update"
              :var="$role->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Publish"
              :var="$role->created_at->diffForHumans()"
            />

            <x-show-data
              name="Sorting"
              :var="$role->sr"
            />

            <x-show-background
              name="Name"
              :text="$role->text"
              :bg="$role->bg"
              :var="$role->name"
            />

            <x-show-data
              name="Slug"
              :var="$role->slug"
            />

            <x-show-data
              name="Background"
              :var="$role->bg"
            />

            <x-show-data
              name="Text"
              :var="$role->text"
            />

            <x-show-data
              name="Description"
              :var="$role->description"
            />

            <x-show-action
              name="Action"
              :edit="route('roles.edit', $role->slug)"
              :delete="route('roles.destroy', $role->slug)"
            />
          </div>

          <div class="max-w-xl mx-auto mt-20 text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              ?
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
