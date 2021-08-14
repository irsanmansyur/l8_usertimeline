<x-app-layout title="Profile User">
  <div class="py-12 px-2 md:px-0">
    <x-card-base class="max-w-7xl mx-auto pb-0">
      <div class="flex content-center py-2 md:py-4">
        <span class="bg-gray-100 rounded-full border-indigo-300">
          <img src="" alt="user" class=" w-15 h-15 flex-shrink-0">
        </span>
        <div class="ml-2 md:ml-4">
          <h3>{{$user->name}}</h3>
          <span class="text-gray-400 text-sm">Bergabung {{$user->created_at->diffForHumans()}}</span>
        </div>
      </div>
      <div class="border-t border-b  dark:border-gray-800 flex justify-between items-center content-center sm:-mx-6 lg:-mx-8">
        <div class="inline-flex">
          <div class="md:py-3 py-1 text-sm md:text-base md:px-10 px-2   dark:border-gray-800 text-center font-semibold">
            Followers
            <span class="block">{{$user->followers()->count()}}</span>
          </div>
          <div class="md:py-3 py-1 text-sm md:text-base md:px-10 px-2  dark:border-gray-800 border-l text-center font-semibold">
            Following
            <span class="block">{{$user->followings()->count()}}</span>
          </div>
          <div class="md:py-3 py-1 text-sm md:text-base md:px-10 px-2 dark:border-gray-800 border-l border-r text-center font-semibold">
            Status
            <span class="block">{{$user->statuses()->count()}}</span>
          </div>
        </div>
        @if (auth()->user()->id != $user->id )
        <div class="md:px-10 px-2">
          <form action="{{route('user.follow',$user)}}" method="post">
            @csrf
            @if ($user->is_follow)
            <x-button class="bg-indigo-200">Unfollow</x-button>
            @else
            <x-button>Follow</x-button>
            @endif
          </form>
        </div>
        @endif
      </div>
    </x-card-base>
    <div class="mt-2 max-w-7xl mx-auto flex flex-wrap">
      <div class="md:w-7/12 w-full">
        @foreach ($statuses as $status)
        <x-status-card :status="$status" class="my-2 pb-0" />
        @endforeach
        {{$statuses}}

      </div>
      <div class="md:w-5/12 w-full md:pl-3 md:pt-2">
        @if ($user->followers()->count()>0)
        <x-card-base>
          <h3 class="py-2">Baru baru Di Ikuti</h3>
          <div class="flex flex-wrap">
            @foreach ($user->followers()->withPivot("created_at")->latest()->limit(6)->get() as $follow)
            <div class="md:w-1/2 w-full pr-2">
              <x-user-follow :follow="$follow" class="mb-2 text-sm py-2" />
            </div>
            @endforeach
          </div>
        </x-card-base>
        @endif
        @if ($user->followings()->count()>0)
        <x-card-base class="mt-2">
          <h3 class="py-2">Baru baru Mengikuti</h3>
          <div class="flex flex-wrap">
            @foreach ($user->followings()->withPivot("created_at")->latest()->limit(6)->get() as $follow)
            <div class="md:w-1/2 w-full pr-2">
              <x-user-follow :follow="$follow" class="mb-2 text-sm py-2" />
            </div>
            @endforeach
          </div>
        </x-card-base>
        @endif
      </div>
    </div>
  </div>
</x-app-layout>