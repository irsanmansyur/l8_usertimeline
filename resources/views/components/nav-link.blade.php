@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 dark:text-white text-gray-900 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out border-indigo-300'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 dark:text-white text-gray-500 hover:text-gray-700 hover:border-indigo-300 focus:outline-none focus:text-gray-700 focus:border-indigo-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>