@props(['status'])

<div {!! $attributes->merge(['class' =>"rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-black dark:text-gray-300 text-gray-600 p-3 shadow-sm overflow-hidden"]) !!}>
  {{ $slot }}
</div>