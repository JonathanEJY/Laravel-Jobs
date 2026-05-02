@props(['name'])

@error($name)
  <p class="text-sm italic text-red-500 mt-1">{{ $message }}</p>
@enderror





{{-- @if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li> 
    @endforeach
  </ul>
@endif --}}