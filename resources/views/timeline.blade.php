<x-app-layout title="Timeline User">
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
      Timeline
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
      <div class="md:w-8/12 w-full">
        <x-add-status />
        @foreach ($statuses as $status)
        <x-status-card :status="$status" class="my-2" />
        @endforeach
        {{$statuses}}
      </div>
      <div class="md:w-4/12 w-full pl-2">
        <x-card-base>
          <h3>Follower</h3>
          @foreach ($followers as $follow)
          <x-user-follow :follow="$follow" class="mb-2" />
          @endforeach
      </div>
    </div>
    </x-card-base>
  </div>
</x-app-layout>