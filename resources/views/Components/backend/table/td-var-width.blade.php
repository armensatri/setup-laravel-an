<div class="flex items-center px-6 py-2 gap-x-3">
  <div class="inline-block hs-tooltip">
    <span class="inline-flex items-center text-gray-600 line-clamp-1
      text-[15px] hs-tooltip-toggle cursor-pointer">

      <span class="line-clamp-1 hover:text-blue-700">
        {{ $var }}
      </span>

      <span role="tooltip"
        class="absolute z-10 invisible inline-block px-2 py-1 text-[13px] tracking-wider text-white transition-opacity bg-gray-800 rounded-lg shadow-sm opacity-0 hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible">
        {{ $tooltip }}
      </span>
    </span>
  </div>
</div>
