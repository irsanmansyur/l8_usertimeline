@extends("layouts.base" ,['title'=> $title])
@section("content")
<div class="font-sans text-gray-900 antialiased dark:bg-gray-800">
  {{ $slot }}
</div>
@endsection