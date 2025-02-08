<div>
  <h2 class="text-lg font-bold tracking-wide text-gray-800 uppercase">
    {{ $tableName }}
  </h2>

  <p class="text-sm tracking-wide text-gray-600">
    Halaman {{ $pageData->currentPage() }}<span class="mx-[1px]">/</span>{{ $pageData->lastPage() }}...
    <span class="ml-1">{{ $pageData->count() }}</span> data, total semua {{ $pageData->total() }} data
  </p>
</div>
