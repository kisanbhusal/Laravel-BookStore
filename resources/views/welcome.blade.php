@extends('master')
@section('content')
@vite(['resources/js/app.js', 'resources/css/app.css'])
<h2 class="font-bold text-4-xl text-center my-5">Our Products</h2>

<div class="grid grid-cols-4 gap-10 px-24 mb-10">
    @foreach($products as $product)
   <a href="{{route('viewproduct',$product->id)}}">
   <div class="bg-gray-100 rounded-lg shadow-lg relative">
        <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-full h-72
        object-cover rounded-t-lg">
        
        
          
        <div class="p-2">
            <p class="font-bold text-2xl">{{ $product->name }}</p>
            <p class="font-bold text-2xl">
                @if($product->oldprice !='')
                <span class="line-through text-gray-500
            text-xl">{{ $product->oldproduct }}</span>
            @endif
            Rs.{{$product->price}}/-</p>

        </div>
        @if($product->oldprice !='')
        @php
            $discount=($product->oldprice - $product->price)/$product->oldprice *100;
        @endphp
        <p class="absolute top-1 right-1 bg-blue-600 text-white rounded-lg px-4
        py-1">{{ $discount }}% off</p>

        
        @endif

        
    </div>
    
   </a>
    
    @endforeach

    

    </div>
    <main class="container mx-auto mt-4">
      <h2 class="text-2xl mb-4">Featured Books</h2>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div class="bg-white shadow-lg p-4">
          <img src="book1.jpg" alt="Book 1" class="w-full h-48 object-cover mb-2">
          <h3 class="text-xl font-semibold">Book 1</h3>
          <p class="text-gray-600">Author: John Doe</p>
          <p class="text-gray-600">Price: $19.99</p>
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded">Add to Cart</button>
        </div>
        
        <div class="bg-white shadow-lg p-4">
          <img src="book2.jpg" alt="Book 2" class="w-full h-48 object-cover mb-2">
          <h3 class="text-xl font-semibold">Book 2</h3>
          <p class="text-gray-600">Author: Jane Smith</p>
          <p class="text-gray-600">Price: $14.99</p>
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded">Add to Cart</button>
        </div>
        
        <!-- Add more book cards as needed -->
      </div>
    </main>
    
    <div class="mx-24 my-10">
        {{$products->links()}}
    </div>
    




@endsection

