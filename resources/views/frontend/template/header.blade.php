<header x-data="{ openSidebar: false }"
  class="fixed inset-x-0 top-0 z-20 max-w-full mx-auto antialiased bg-sky-100">

  <nav aria-label="Global"
    class="flex items-center justify-between p-5 lg:px-8">
    <div class="flex lg:flex-1">
      <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
        <img src="/frontend/img/logo.jpg"
          alt="logo"
          class="w-auto h-8 rounded-full"
        />
      </a>
    </div>

    <div class="flex lg:hidden">
      <button @click="openSidebar = true"
        type="button"
        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <svg fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          aria-hidden="true"
          class="w-6 h-6">
          <path stroke-linecap="round"
            stroke-linejoin="round"
            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
          />
        </svg>
      </button>
    </div>

    <!-- menu web -->
    <div class="hidden lg:flex lg:gap-x-4">
      <a href="{{ route('home') }}"
        class="tracking-wide justify-center px-3.5 py-[3px] text-base font-medium leading-6 text-black border border-gray-400
        rounded-[13px] bg-blue-200 hover:bg-blue-300 cursor-pointer">
        Home
      </a>
    </div>

    <!-- menu auth -->
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
      @auth
        <div id="dropdownHoverButton"
          data-dropdown-toggle="dropdownAuth"
          data-dropdown-trigger="hover"
          class="flex items-center gap-x-2 tracking-wide justify-center px-3 py-[3px] text-base font-medium rounded-[13px] cursor-pointer">

          <picture>
            <img src="{{ Auth::user() && Auth::user()->image ?
              asset('storage/' . Auth::user()->image) :
              '/backend/img/user.png' }}"
              alt="user-default"
              loading="lazy"
              class="object-cover object-top p-0.5
              bg-white rounded-full w-9 h-9"
            />
          </picture>

          <span class="hidden text-[17px] font-normal tracking-wide text-black truncate sm:block">
            <span>@</span>{{ Auth::user()->username }}
          </span>

          <i class="text-base text-black bi bi-arrow-down-circle"></i>
        </div>

        <div id="dropdownAuth"
          class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">

          <ul aria-labelledby="dropdownHoverButton"
            class="py-2 text-sm text-gray-700 dark:text-gray-200">
            <li>
              @if (Auth::user()->role->name === 'Owner')
                <x-route-to-dashboard
                  :route="route('owner')"
                />
              @elseif (Auth::user()->role->name === 'Super Admin')
                <x-route-to-dashboard
                  :route="route('superadmin')"
                />
              @elseif (Auth::user()->role->name === 'Admin')
                <x-route-to-dashboard
                  :route="route('admin')"
                />
              @else
                <x-route-to-dashboard
                  :route="route('member')"
                />
              @endif
            </li>

            <form action="{{ route('logout') }}"
              method="POST" class="flex justify-center">
              @csrf

              <button type="submit"
                class="px-4 py-1 mb-3 bg-red-600 hover:bg-red-600 rounded-xl">
                <div class="inline-flex items-center justify-center">
                  <i class="text-white bi bi-arrow-right-circle"></i>
                  <span class="ml-1 text-sm tracking-wider text-white">
                    Logout
                  </span>
                </div>
              </button>
            </form>
          </ul>
        </div>
      @else
        <a href="{{ route('login') }}"
          class="px-3.5 py-[3px] text-base font-semibold leading-6 text-gray-900 bg-blue-200 border border-gray-400 rounded-xl
          hover:bg-blue-300">
          Login
        </a>
      @endauth
    </div>
  </nav>

  <div x-show="openSidebar"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opcity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="lg:hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-50"></div>
    <div class="fixed inset-y-0 right-0 z-50 w-full px-6 py-6 overflow-y-auto bg-white sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">

      <div class="flex items-center justify-between">
        <a href="{{ route('home') }}"
          class="-m-1.5 p-1.5">
          <img src="/frontend/img/logo.jpg"
            alt="logo"
            class="w-auto h-8 rounded-full"
          />
        </a>

        <button @click="openSidebar = false"
          type="button"
          class="-m-2.5 rounded-md p-2.5 text-gray-700">
          <svg fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            aria-hidden="true"
            class="w-6 h-6">
            <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>
      </div>

      <!-- menu mobile -->
      <div class="flow-root mt-6">
        <div class="-my-6 divide-y divide-gray-500/10">
          <div class="py-6 space-y-2">
            <a href="#"
              class="block px-3 py-2 -mx-3 text-base italic font-semibold leading-7 text-gray-900 rounded-lg hover:bg-gray-50">
              Menu Mobile
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
