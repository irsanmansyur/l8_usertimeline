<x-app-layout title="Profile User">
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
      Update Your Profile!
    </h2>
  </x-slot>
  <div class="max-w-7xl mx-auto flex flex-wrap">
    <div class="w-1/2 mt-3">
      <x-card-base>
        <!-- name user -->
        <h2 class=" text-2xl py-2">Profile Informatioan</h2>
        <form action="{{route('user.edit')}}" method="post">
          @csrf
          <div class="mb-4">
            <x-label for="name">Nama</x-label>
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$user->name)" required autofocus />
            <x-error-input name="name" />
          </div>
          <div class="text-right">
            <x-button>Update</x-button>
          </div>
        </form>
      </x-card-base>
    </div>
    <div class="w-1/2 mt-3 pl-2">
      <x-card-base>
        <h2 class="text-2xl py-2">Security Update</h2>
        <form action="{{route('user.edit-email')}}" method="post">
          @csrf
          <div class="mb-4">
            <x-label for="email">Email</x-label>
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email',$user->email)" required autofocus />
            <x-error-input name="email" />
          </div>
          <div class="mb-4">
            <x-label for="email">Password *</x-label>
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autofocus />
            <x-error-input name="password" />
          </div>
          <div class="text-right">
            <x-button>Change Email</x-button>
          </div>
        </form>
      </x-card-base>
    </div>
  </div>
</x-app-layout>