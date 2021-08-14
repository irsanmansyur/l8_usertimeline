@props(['name' => ''])
@error($name)
<div class="text-sm text-red-600 dark:text-red-800 inline">
  {{$message}}
</div>
@enderror