@extends('layouts.app');
@section('content')
<h2 class="fond-bold text-4xl text-blue-700">Edit Categories</h2>
<hr class="h-1 bg-blue-200">
  <form action="{{ route('Categories.update',$category->id) }}" class="mt-5" method="post">
    @csrf
    <input type="text" placeholder="Category Name" name="name" class="w-full rounded-lg border-gray-300 my-2" value="{{$category->name }}">
    @error('name')
    <p class="text-red-600" text-xs -mt-2">{{ $message }}</p>
      @enderror
    
    <input type="text" placeholder="Priority" name="priority" class="w-full rounded-lg border-gray-300 my-2" value="{{ $category->priority }}">
    @error('priority')
    <p class="text-red-600" text-xs -mt-2">{{ $message }}</p>
      @enderror
    
    <div class="flex">
  <input type="submit" class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400" value="Edit Category">

  
  <a href="{{route('Categories.index') }}"class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400 ml-4">Exit</a>
</div>
  </form>

@endsection