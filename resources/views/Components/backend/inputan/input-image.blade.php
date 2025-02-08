<div class="w-full py-2">
  <div class="flex ml-1 justify-start gap-1.5">
    <div>
      <label for="{{ $labelFor }}"
        class="block mb-1.5 text-base font-medium text-green-700">
        {{ $labelName }}
      </label>
    </div>
  </div>

  <input type="{{ $type }}"
    id="{{ $id }}"
    name="{{ $name }}"
    onchange="previewImage()"
    class="block w-full px-3 text-sm text-gray-700 border border-gray-300 bg-gray-50 rounded-2xl cursor-pointer"
  />

  @error($error)
    <div class="mt-1 ml-3.5">
      <p class="font-serif text-sm font-medium tracking-wide text-red-500">
        {{ $message }}
      </p>
    </div>
  @enderror
</div>
