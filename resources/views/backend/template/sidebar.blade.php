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
          @include('backend.template.dashboard')

          @foreach ($menus as $menu)
            <x-menu
              menu="{{ $menu->name }}"
            />
            @foreach ($menu->submenus as $submenu)
              <li class="px-2">
                <x-submenu
                  :route="route($submenu->routename)"
                  :active="$submenu->active . '*'"
                  :sub-menu="$submenu->name"
                  :icon="asset($submenu->icon)"
                />
              </li>
            @endforeach
          @endforeach

          <x-menu
            menu="manage"
          />
          <li class="px-2">
            <x-submenu
              :route="route('users.index')"
              active="users*"
              sub-menu="users"
              icon="/image/users.jpg"
            />
            <x-submenu
              :route="route('roles.index')"
              active="roles*"
              sub-menu="roles"
              icon="/image/roles.jpg"
            />

            <x-submenu
              :route="route('menus.index')"
              active="menus*"
              sub-menu="menus"
              icon="/image/menu.jpg"
            />
            <x-submenu
              :route="route('submenus.index')"
              active="submenus*"
              sub-menu="submenus"
              icon="/image/submenu.jpg"
            />
          </li>
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
