<navbar class="top-0 flex w-full bg-[#6777ef] relative">
  <div class="flex items-center justify-between flex-grow px-4 mt-5 mb-11">
    <div class="flex items-center px-4 lg:hidden">
      <button @click.stop="sidebarToggle = !sidebarToggle"
        class="z-99999 block bg-white p-1.5 rounded-lg dark:border-strokedark dark:bg-boxdark lg:hidden shadow-sm hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          class="bi bi-list"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"
          />
        </svg>
      </button>
    </div>

    <div class="hidden sm:block"></div>

    <div class="flex items-center px-4">
      <div>
        <div class="m-1 z-40 hs-dropdown [--trigger:hover] relative
          inline-flex">

          <div id="hs-dropdown-hover-event"
            class="inline-flex items-center text-sm font-medium rounded-lg cursor-pointer hs-dropdown-toggle gap-x-2 disabled:opacity-50 disabled:pointer-events-none">

            <picture>
              <img src="{{ Auth::user() && Auth::user()->image ?
                asset('storage/' . Auth::user()->image) :
                '/backend/img/user.png' }}"
                alt="image-user"
                loading="lazy"
                class="object-cover object-top p-0.5
                bg-white rounded-full w-9 h-9"
              />
            </picture>

            <span class="hidden text-[17px] font-normal tracking-wide text-white truncate sm:block">
              <span>@</span>{{ Auth::user()->username }}
            </span>

            <i class="text-base text-white bi bi-arrow-down-circle"></i>
          </div>

          <div aria-labelledby="hs-dropdown-hover-event"
            class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-48 bg-white shadow-md rounded-3xl p-3 mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 border border-gray-400 before:absolute before:-top-4 before:start-0 before:w-full">

            <div class="py-2 mb-2 first:pt-0 last:pb-0">
              <span class="block px-3 py-2 text-xs font-medium tracking-wider text-green-700 uppercase">
                role access
              </span>

                <div class="ml-1.5 tracking-wider text-sm flex items-center
                  gap-x-3.5 py-2 px-3 text-red-700 font-medium">
                  <i class="text-base text-gray-800 fa-solid fa-user-tie">
                  </i>
                  {{ Auth::User()->role->name }}
                </div>

              <div class="home">
                <span class="block px-3 py-2 text-xs font-medium tracking-wider text-green-700 uppercase">
                  BACK TO
                </span>

                <a href="{{ route('home') }}"
                  class="ml-1.5 tracking-wider text-sm flex items-center gap-x-3.5 py-2 px-3 text-gray-900 font-medium hover:bg-gradient-to-r from-blue-100 to-purple-100 rounded-[13px]">
                  <i class="text-base text-gray-900 bi bi-house-fill"></i>
                  Home
                </a>
              </div>
            </div>

            @auth
              <form action="{{ route('logout') }}"
                method="POST" class="flex justify-center">
                @csrf

                <button type="submit"
                  class="px-3 py-1 mb-3 bg-red-600 shadow-sm hover:bg-red-700 rounded-xl">
                  <div class="inline-flex items-center justify-center">
                    <i class="text-white bi bi-arrow-right-circle"></i>
                    <span class="ml-1 text-sm tracking-wider text-white">
                      Logout
                    </span>
                  </div>
                </button>
              </form>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>
</navbar>
