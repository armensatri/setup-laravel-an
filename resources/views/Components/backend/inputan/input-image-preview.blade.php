<div class="w-full py-2">
  <div class="flex ml-1 justify-start gap-1.5">
    <div>
      <label for="{{ $labelFor }}"
        class="block mb-1.5 text-base font-medium text-green-700">
        {{ $labelName }}
      </label>
    </div>
  </div>

  <div class="mt-1">
    @if ($image)
      <div class="w-[200px] p-2 bg-gray-50 rounded-2xl h-[200px]
        border border-gray-200">
        <img src="{{ asset('storage/' . $image) }}"
          alt="image"
          class="relative object-cover object-top w-full h-full img-preview rounded-xl"
        />
      </div>
    @else
      <div class="w-[200px] p-2 bg-gray-100 rounded-2xl h-[200px]
        border border-gray-300">
        <img alt="image"
          class="relative object-cover object-center w-full h-full img-preview rounded-xl"
        />
      </div>
    @endif
  </div>
</div>
