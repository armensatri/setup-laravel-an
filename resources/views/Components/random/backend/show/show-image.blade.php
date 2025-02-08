<div class="grid gap-4 pb-4 md:grid-cols-12 md:gap-6">
  <div class="md:col-span-3">
    <div class="text-base tracking-wide text-gray-800">
      {{ $name }}
    </div>
  </div>

  <div class="md:col-span-6">
    <div class="inline-block">
      <img src="{{ $asset ? asset(
        'storage/' . $asset
      ) : asset($assetDefault) }}"
        alt="image"
        class="w-[250px] h-[250px] object-cover object-top rounded-3xl"
      />
    </div>
  </div>
</div>
