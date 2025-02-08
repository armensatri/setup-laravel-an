<div class="grid gap-4 pb-4 md:grid-cols-12 md:gap-6">
  <div class="md:col-span-3">
    <div class="text-base tracking-wide text-gray-800">
      {{ $name }}
    </div>
  </div>

  <div class="md:col-span-6">
    <div class="inline-block">
      <div class="inline-flex items-center gap-x-2.5">
        <div>
          <a href="{{ $edit }}">
            <div class="bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-xl">
              <i class="text-base text-white bi bi-pencil-square"></i>
            </div>
          </a>
        </div>

        <div>
          <form action="{{ $delete }}"
            method="POST">
            @method('delete')
            @csrf

            <button type="submit"
              onclick="return confirm('yakin menghapus data ini ?')"
              class="px-3 py-1.5 bg-red-600 hover:bg-red-700 rounded-xl">
              <i class="text-base text-white bi bi-trash3"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
