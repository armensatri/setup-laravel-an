<div class="w-full py-2">
  <div class="flex ml-1 justify-start gap-1.5">
    <div>
      <label for="{{ $labelFor }}"
        class="block mb-1.5 text-base font-medium text-green-700">
        {{ $labelName }}
      </label>
    </div>
  </div>

  <select id="{{ $id }}"
    name="{{ $name }}"
    class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-2xl focus:ring-1 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-gray-700 placeholder:tracking-wide placeholder:ps-1 tracking-wide">
    <option disabled selected>
      {{ $placeholder }}
    </option>

    @foreach($items as $item)
      @if (old($valueOld, $valueDefault) == $item->id)
        <option value="{{ $item->id }}" selected>
          {{ $item->id }} - {{ $item->name }}
        </option>
      @else
        <option value="{{ $item->id }}">
          {{ $item->id }} - {{ $item->name }}
        </option>
      @endif
    @endforeach
  </select>

  @error($error)
    <div class="mt-1 ml-3.5">
      <p class="font-serif text-sm font-medium tracking-wide text-red-500">
        {{ $message }}
      </p>
    </div>
  @enderror
</div>
