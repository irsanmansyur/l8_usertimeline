@props(['follow'])
<x-card-base class="{{$attributes['class']}}">
  <div class="flex content-center">
    <span class="mt-1">
      <img src="" alt="." class="w-10 h-10 rounded-full border-gray-400 bg-gray-200">
    </span>
    <div class="ml-2">
      <a href="{{ route('user.profile', $follow)}}">
        <span class="block my-0">{{$follow->name}}</span>
      </a>
      <span class="text-sm text-gray-500 mt-0 text-sm">{{$follow->pivot->created_at->diffForHumans()}}</span>
    </div>
  </div>
</x-card-base>