<x-menu
  menu="home"
/>

<li class="px-2">
  @if (Auth::user()->role->name === 'Owner')
    <x-submenu
      :route="route('owner')"
      active="owner*"
      sub-menu="dashboard"
      icon="/image/dashboard.jpg"
    />
  @elseif (Auth::user()->role->name === 'Super Admin')
    <x-submenu
      :route="route('superadmin')"
      active="superadmin*"
      sub-menu="dashboard"
      icon="/image/dashboard.jpg"
    />
  @elseif (Auth::user()->role->name === 'Admin')
    <x-submenu
      :route="route('admin')"
      active="admin*"
      sub-menu="dashboard"
      icon="/image/dashboard.jpg"
    />
  @else
    <x-submenu
      :route="route('member')"
      active="member*"
      sub-menu="dashboard"
      icon="/image/dashboard.jpg"
    />
  @endif
</li>
