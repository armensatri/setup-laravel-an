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
              user - {{ $user->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-data
              name="Id"
              :var="$user->id"
            />

            <x-show-data
              name="Create"
              :var="$user->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Update"
              :var="$user->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Publish"
              :var="$user->created_at->diffForHumans()"
            />

            <x-show-data
              name="Name"
              :var="$user->name"
            />

            <x-show-data
              name="Username"
              :var="$user->username"
            />

            <x-show-data
              name="Email"
              :var="$user->email"
            />

            <x-show-background
              name="Role"
              :text="$user->role->text"
              :bg="$user->role->bg"
              :var="$user->role->name"
            />

            <x-show-background
              name="Active"
              :bg="$user->active()['bg']"
              :text="$user->active()['text']"
              :var="$user->active()['active']"
            />

            <x-show-image
              name="Image"
              :asset="$user->image"
              asset-default="/image/default.png"
            />

            <x-show-action
              name="Action"
              :edit="route('users.edit', $user->username)"
              :delete="route('users.destroy', $user->username)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
