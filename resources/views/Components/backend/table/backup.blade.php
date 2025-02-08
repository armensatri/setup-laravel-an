<button type="button"
  data-hs-overlay="#hs-vertically-centered-modal"
  class="inline-flex items-center px-3 py-1.5 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-xl gap-x-2 hover:bg-blue-700 disabled:opacity-50">
  <i class="bi bi-download"></i>
</button>

<div id="hs-vertically-centered-modal"
  class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">

  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100
    hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">

    <div class="p-3 flex flex-col w-full bg-white shadow-sm
      pointer-events-auto rounded-[28px]">

      <div class="flex items-center justify-between px-4 py-3">
        <div class="text-xl font-bold text-gray-800">
          Backup data
          <span class="text-blue-500">
            {{ $tableName }}
          </span>
        </div>

        <button type="button"
          data-hs-overlay="#hs-vertically-centered-modal"
          class="flex items-center justify-center text-base font-semibold text-black rounded-full hover:border hover:border-gray-500 hover:text-white hover:bg-red-500 size-7 disabled:opacity-50">

          <span class="sr-only">Close</span>

          <svg class="flex-shrink-0 size-4"
            xmlns="http://www.w3.org/2000/svg"
            width="25"
            height="25"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>

      <div class="p-4 overflow-y-auto">
        <!-- START IMPORT -->
        {{-- <div class="py-3">
          <div class="mb-4 text-lg font-bold text-gray-800">
            <span class="text-blue-500">
              Import
            </span>
            data
          </div>

          <div class="flex ml-4 flex-start">
            <div class="grid grid-cols-2 gap-x-12">
              sql csv
              sql csv json excel pdf
              <div class="text-center">
                <a href="#">
                  <div class="app-components-backup">
                    <img src="/backend/img/backup/json.png"
                      alt="image"
                      class="w-10 h-10"
                    />
                  </div>
                  <div class="app-components-backup-name">
                    json
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div> --}}
        <!-- END IMPORT -->
      </div>
    </div>
  </div>
</div>
