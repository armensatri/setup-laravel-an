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

      @if (session()->has('alert'))
        @include('sweetalert::alert')
      @endif

      <section class="w-full px-4 mt-8 mb-5">
        <div class="app-cse-border">
          <div class="flex justify-center">
            <div class="max-w-md px-16 border border-gray-200 bg-gray-50 rounded-3xl dark:bg-gray-800 dark:border-gray-700">
              <div class="flex flex-col items-center mb-10">
                  <img class="w-32 h-32 mt-8 mb-3 rounded-full" src="{{ $user->image ? asset(
                      'storage/' . $user->image
                    ) : asset('/image/default.png') }}" alt="Bonnie image"/>
                  <div class="mb-1 text-lg font-medium tracking-wide text-gray-900 uppercase dark:text-white">{{ $user->name }}</div>
                  <span class="text-base tracking-normal text-gray-500 dark:text-gray-400">{{ $user->email }}</span>
                  <div class="flex mt-4 md:mt-6">
                    <div class="bg-{{ $user->role->bg }} inline-block rounded-full tracking-wider">
                      <div class="px-3.5 py-1.5 text-sm uppercase font-medium
                        text-{{ $user->role->text }}">
                        role access {{ $user->role->name }}
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endSection
