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

      <section class="flex justify-center w-full px-4 mt-8 mb-5">
        <div class="border border-black rounded-lg p-2 shadow-md bg-white dark:bg-gray-800 w-[80px]">
          <div class="flex justify-center">
            <img src="/image/default.png" alt="Profile Image" class="w-[40px] h-[40px] rounded-full">
          </div>
          <div class="mt-1 text-center">
            <h5 class="text-xs font-medium text-gray-900 dark:text-white">Bonnie</h5>
            <span class="text-[10px] text-gray-500 dark:text-gray-400">Designer</span>
          </div>
        </div>
      </section>
    </div>
  </div>
@endSection
