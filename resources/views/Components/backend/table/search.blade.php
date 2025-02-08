<button type="button"
  data-hs-overlay="#hs-slide-down-animation-modal"
  class="inline-flex items-center px-3 py-1.5 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-xl gap-x-2 hover:bg-blue-700">
  <i class="bi bi-search"></i>
</button>

<div id="hs-slide-down-animation-modal"
  class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">

  <div class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full sm:mx-auto">

    <div class="flex flex-col p-3 bg-white shadow-sm
      pointer-events-auto rounded-[28px]">

      <div class="flex items-center justify-between px-4 py-3">
        <div class="text-xl font-bold tracking-normal text-gray-800">
          Search data
          <span class="text-blue-500">
            {{ $search }}
          </span>
        </div>

        <button type="button"
          data-hs-overlay="#hs-slide-down-animation-modal"
          class="flex items-center justify-center text-base font-semibold text-black rounded-full size-7 hover:bg-red-500 hover:text-white hover:border hover:border-gray-500">

          <span class="sr-only">Close</span>

          <svg xmlns="http://www.w3.org/2000/svg"
            width="25"
            height="25"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="flex-shrink-0 size-4">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>

      <div class="p-4 overflow-y-auto">
        <div class="max-w-full space-y-3">
          <div>
            <div class="relative">
              <input type="search"
                autofocus
                id="search"
                name="search"
                placeholder="{{ $placeholder }}"
                class="app-auth-inputan"
              />

              <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-4">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex items-center justify-end px-4 py-3 gap-x-2">
        <button type="submit"
          class="inline-flex items-center px-3.5 py-1 text-base font-semibold text-white bg-blue-600 border tracking-wide border-transparent rounded-xl gap-x-2 hover:bg-blue-700 disabled:opacity-50">
          Search
        </button>
      </div>
    </div>
  </div>
</div>
