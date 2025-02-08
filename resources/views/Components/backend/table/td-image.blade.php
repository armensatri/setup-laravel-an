<div class="px-6 py-3">
  <div class="flex items-center gap-x-2">
    @if ($asset)
      <img class="inline-block object-cover outline outline-offset-2 outline-1 outline-blue-400 object-top rounded-full size-8"
        src="{{ $asset ? asset(
          'storage/' . $asset
        ) : asset($assetDefault) }}"
        alt="image"
      />
    @else
      <img class="inline-block object-cover object-top rounded-full size-8"
        src="{{ $asset ? asset(
          'storage/' . $asset
        ) : asset($assetDefault) }}"
        alt="image"
      />
    @endif
  </div>
</div>
