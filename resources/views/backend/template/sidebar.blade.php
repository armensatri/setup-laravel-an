<sidebar @click.outside="sidebarToggle = false"
  :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
  class="absolute top-0 left-0 z-50 flex flex-col w-64 h-screen overflow-y-hidden duration-300 ease-linear hover:overflow-y-scroll bg-slate-50 dark:bg-boxdark lg:static lg:translate-x-0 drop-shadow-md">

  <div class="flex flex-col duration-300 ease-linear no-scrollbar">
    <div class="flex justify-center py-5">
      <div class="px-3 py-[7px] text-base font-normal leading-none
        tracking-wide text-white bg-green-700 rounded-full">
        App name
      </div>
    </div>

    @auth
      <div class="mt-2">
        <ul>
          @foreach ($menus as $menu)
            <x-menu
              menu="{{ $menu->name }}"
            />
            @foreach ($menu->submenus as $submenu)
              <li class="px-2">
                <x-submenu
                  :route="$submenu->routename"
                  {{-- :route="route($submenu->routename)" --}}
                  :active="$submenu->active . '*'"
                  :sub-menu="$submenu->name"
                  :image="asset($submenu->image)"
                />
              </li>
            @endforeach
          @endforeach
        </ul>

        <div class="px-5 mx-auto mt-8 mb-8">
          <div class="flex justify-center">
            <button type="button"
              class="w-full px-2 py-3 text-sm font-normal tracking-wider text-center text-white bg-blue-600 rounded-xl drop-shadow-md">
              <span class="font-sans">
                010123{{ date('y') }}
              </span>
            </button>
          </div>
        </div>
      </div>
    @endauth
  </div>
</sidebar>
