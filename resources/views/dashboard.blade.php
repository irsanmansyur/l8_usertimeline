<x-app-layout title="Dashboard">
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-card-base>
        You're logged in!
      </x-card-base>
    </div>
  </div>
</x-app-layout>