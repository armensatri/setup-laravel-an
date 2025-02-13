<nav aria-label="Page navigation example">
  <ul class="inline-flex h-8 -space-x-px text-sm">
    {{-- Tombol Previous --}}
    @if ($pagination->onFirstPage())
      <li class="disabled">
        <span class="inline-flex items-center justify-center px-4 ml-0 font-semibold leading-tight tracking-wider border border-gray-300 rounded-l-full h-9 bg-slate-300 text-slate-900">
          prev
        </span>
      </li>
    @else
      <li>
        <a href="{{ $pagination->previousPageUrl() }}"
          class="inline-flex items-center justify-center px-4 ml-0 font-semibold leading-tight tracking-wider border border-gray-300 rounded-l-full h-9 bg-slate-300 text-slate-900">
          prev
        </a>
      </li>
    @endif

    {{-- Tampilkan halaman 2 sebelumnya --}}
    @for ($i = max(1, $pagination->currentPage() - 2);
      $i < $pagination->currentPage(); $i++)
      <li>
        <a href="{{ $pagination->url($i) }}"
          class="flex items-center justify-center px-4 font-medium leading-tight text-black bg-white border border-gray-300 rounded-md h-9 hover:bg-gray-100 hover:text-gray-700">
          {{ $i }}
        </a>
      </li>
    @endfor

    {{-- Halaman Aktif --}}
    <li>
      <div aria-current="page"
        class="mx-0.5 flex items-center justify-center h-9 px-4 font-medium text-white bg-green-700 rounded-xl drop-shadow-lg ring-1 ring-black">
        {{ $pagination->currentPage() }}
      </div>
    </li>

    {{-- Tampilkan 2 halaman berikutnya --}}
    @for ($i = $pagination->currentPage() + 1;
      $i <= min($pagination->currentPage() + 2,
      $pagination->lastPage()); $i++)
      <li>
        <a href="{{ $pagination->url($i) }}"
          class="flex items-center justify-center px-4 font-medium leading-tight text-black bg-white border border-gray-300 rounded-md h-9 hover:bg-gray-100 hover:text-gray-700">
          {{ $i }}
        </a>
      </li>
    @endfor

    {{-- Tombol Next --}}
    @if ($pagination->hasMorePages())
      <li>
        <a href="{{ $pagination->nextPageUrl() }}"
          class="inline-flex items-center justify-center px-4 font-semibold leading-tight tracking-wider border border-gray-300 rounded-r-full h-9 bg-slate-300 text-slate-900">
          next
        </a>
      </li>
    @else
      <li class="disabled">
        <span class="inline-flex items-center justify-center px-4 font-semibold leading-tight tracking-wider border border-gray-300 rounded-r-full h-9 bg-slate-300 text-slate-900">
          next
        </span>
      </li>
    @endif
  </ul>
</nav>
