<a href="{{ $route }}"
  class="{{ Request::is($active) ? $active : '' }}
  flex items-center p-2 hover:bg-slate-100 hover:rounded-full">

  <img src="{{ $image }}"
    alt="icon"
    class="w-[16px] h-[16px] ml-2"
  />

  <span class="ml-3.5 text-base font-normal tracking-wide
    text-blue-600">
    {{ $subMenu }}
  </span>

  <span class="ml-2">
    @if(Request::is($active))
      <svg xmlns="http://www.w3.org/2000/svg"
        width="13"
        height="13"
        fill="currentColor"
        viewBox="0 0 16 16"
        class="text-green-600 bi bi-check2-circle">
        <path d="M2.5 8a5.5 5.5 0 0 1
          8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5
          8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"
        />

        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8
          9.293 5.354 6.646a.5.5 0 1 0-.708.708l3
          3a.5.5 0 0 0 .708 0z"
        />
      </svg>
    @endif
  </span>
</a>
