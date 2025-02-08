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
          <div class="p-8 text-center">
            <div class="mb-4 text-3xl font-extrabold tracking-wider text-gray-900 uppercase">
              welcome back {{ $superadmin->name }}
            </div>

            <div class="font-light tracking-wide text-gray-600 sm:text-xl">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis voluptatem praesentium consequuntur mollitia incidunt maiores nostrum obcaecati quas quasi ea.
            </div>

            <div class="bg-{{ $superadmin->role->bg }} mt-8 inline-block rounded-full tracking-wider">
              <div class="px-3.5 py-1.5 text-sm uppercase font-medium
                text-{{ $superadmin->role->text }}">
                role access {{ $superadmin->role->name }}
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endSection
