<x-card-base>
  <div class="flex">
    <span class="mr-2 pt-1">
      <img src="" alt="." class="w-10 h-10 rounded-full border-gray-50 bg-gray-100">
    </span>
    <div class="w-full">
      <h3>{{auth()->user()->name}}</h3>
      <form action="{{ route('timeline.add')}}" method="post" class="text-right">
        @csrf
        <textarea name="body" id="body" class="border rounded-xl w-full  bg-gray-100 dark:bg-gray-800 focus:outline-none border-gray-200 dark:border-gray-600 resize-none h-12 focus:ring-transparent" placeholder="Apa yang anda Pikrkan.!"></textarea>
        <x-button>Kirim</x-button>
      </form>
    </div>
  </div>
</x-card-base>