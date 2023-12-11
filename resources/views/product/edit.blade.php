@extends('layouts.app');
@section('content')
<h2 class="fond-bold text-4xl text-blue-700">Edit Product</h2>
<hr class="h-1 bg-blue-200">
  <form action="{{ route('product.update',$product->id) }}" class="mt-5" method="post" enctype="multipart/form-data">
    @csrf



    <input type="text" placeholder="Product Name" name="name" class="w-full rounded-lg border-gray-300 my-2" value="{{$product->name}}">
    @error('name')
    <p class="text-red-600" text-xs -mt-2">{{ $message }}</p>
      @enderror

      <input type="text" placeholder="Language" name="language" class="w-full rounded-lg border-gray-300 my-2" value="{{$product->language}}">
      @error('language')
      <p class="text-red-600" text-xs -mt-2">{{ $message }}</p>
        @enderror

      <select name="category_id" id="" class="w-full rounded-lg border-gray-300 my-2">
        @foreach ($categories as $category)
        <option value="{{$category->id }}">{{$category->name }}</option>  
        @endforeach
    </select>

     <select name="author_id" id="" class="w-full rounded-lg border-gray-300 my-2">
      @foreach ($authors as $author)
      <option value="{{$author->id }}">{{$author->name }}</option>  
      @endforeach
  </select>

    <select name="publisher_id" id="" class="w-full rounded-lg border-gray-300 my-2">
    @foreach ($publishers as $publisher)
    <option value="{{$publisher->id }}">{{$publisher->name }}</option>  
    @endforeach
</select> 

<input type="number" placeholder="Old price" name="oldprice" class="w-full rounded-lg border-gray-300 my-2" value="{{ old('oldprice') }}">
    @error('oldprice')
    <p class="text-red-600" text-xs -mt-2">{{ $message }}</p>
      @enderror
    
    <input type="number" placeholder="Price" name="price" class="w-full rounded-lg border-gray-300 my-2" value="{{ $product->price }}">
    @error('price')
    <p class="text-red-600" text-xs -mt-2">{{ $message }}</p>
      @enderror

      <input type="number" placeholder="Stock"name="stock" class="w-full rounded-lg border-gray-300 my-2" value="{{ $product->stock}}">
    @error('stock')
    <p class="text-red-600" text-xs -mt-2">{{ $message }}</p>
      @enderror
      <p>Current Picture</p>
      <img src="{{ asset('images/products/'.$product->photopath) }}" alt="" class="w-20">
    <input type="file"  name="photopath" class="w-full rounded-lg border-gray-300 my-2">
    @error('photopath')
    <p class="text-red-600" text-xs -mt-2">{{ $message }}</p>
      @enderror

      <textarea placeholder="Description" name="description" class="w-full  row-5 rounded-lg border-gray-300 my-2" value="">{{$product->description }}</textarea>
    @error('description')
    <p class="text-red-600" text-xs -mt-2">{{ $message }}</p>
      @enderror
    
    <div class="flex">
  <input type="submit" class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400" value="Update Product">

  
  <a href="{{route('product.index') }}"class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400 ml-4">Exit</a>
</div>
  </form>

@endsection