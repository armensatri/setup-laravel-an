<div class="px-6 py-1.5">
  <div class="m-1 hs-dropdown text-center
    [--trigger:hover] relative inline-flex">

    <div id="hs-dropdown-hover-event-{{ $id }}"
      aria-haspopup="menu"
      aria-expanded="false"
      aria-label="Dropdown"
      class="inline-flex items-center px-1 py-0.5 text-sm font-medium text-slate-900 cursor-pointer hs-dropdown-toggle
      hover:text-blue-600">
      <i class="bi bi-gear-fill"></i>
    </div>

    <div role="menu"
      aria-orientation="vertical"
      aria-labelledby="hs-dropdown-hover-event-{{ $id }}"
      class="hs-dropdown-menu transition-[opacity,margin] duration
      z-30 hs-dropdown-open:opacity-100 opacity-0 hidden min-w-max bg-slate-50 border border-gray-400 shadow-md rounded-2xl p-3 space-y-2 mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full">

      <span class="block text-xs font-medium text-gray-800 uppercase">
        {{ $id }}
      </span>

      <span class="block mb-4 text-xs font-medium text-gray-600 uppercase">
        Actions
      </span>

      <div class="flex gap-2">
        <div>
          <a href="{{ $show }}"
            class="inline-flex items-center justify-center px-3 py-1 bg-green-700 rounded-xl hover:bg-green-800">
            <i class="text-base text-white bi bi-eye"></i>
          </a>
        </div>

        <div>
          <a href="{{ $edit }}"
            class="inline-flex items-center justify-center px-3 py-1 bg-blue-600 rounded-xl hover:bg-blue-700">
            <i class="text-base text-white bi bi-pencil-square"></i>
          </a>
        </div>

        <div>
          <form action="{{ $delete }}"
            method="POST">
            @method('delete')
            @csrf

            <button type="submit"
              onclick="return confirm('yakin menghapus data ini ?')"
              class="inline-flex items-center justify-center px-3 py-1 bg-red-600 hover:bg-red-700 rounded-xl">
              <i class="text-base text-white bi bi-trash3"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
