@props(['status'])
<x-card-base class="{{$attributes['class']}}">
  <div class="flex justify-between">
    <div class="flex">
      <span class="mt-1">
        <img src="" alt="." class="w-10 h-10 rounded-full border-gray-400 bg-gray-200">
      </span>
      <div class="ml-2">
        <span class="block">{{$status->author->name}}</span>
        <span class="text-sm text-gray-500">{{$status->created_at->diffForHumans()}}</span>
      </div>
    </div>
    <span>
      <button class="hover:bg-gray-800 flex justify-center content-center rounded-full focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
        </svg>
      </button>
    </span>
  </div>
  <p class="my-2 dark:text-gray-300">
    {{$status->body}}
  </p>
  <div class="flex justify-between content-center mt-2 ">
    <span class="text-blue-500 inline-flex content-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
      </svg>
      <span class="ml-1">
        {{$status->like_view_count}}
      </span>
    </span>
    <span>7 Komentar</span>
  </div>
  <div class="flex border-t dark:border-gray-800 mt-2 text-sm text-gray-600 dark:text-gray-300 justify-between font-bold">
    <form action="{{ route('timeline.status_like',$status)}}" method="post" class="w-1/2 py-1">
      @csrf
      @if ($status->user_is_like)
      <button class="w-full hover:bg-gray-400 dark:hover:bg-gray-800 rounded-md text-center block py-2 focus:outline-none text-blue-600">Batal Suka</button>
      @else
      <button class="w-full hover:bg-gray-400 dark:hover:bg-gray-800 rounded-md text-center block py-2 focus:outline-none">Suka</button>
      @endif
    </form>
    <button class="w-1/2 rounded-md hover:bg-gray-400 dark:hover:bg-gray-800 py-2 my-1">Komentar</button>
  </div>
</x-card-base>