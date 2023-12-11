@extends('master')
@section('content')
@include('layouts.message')
<script src="{{ asset('datatable/jquery-3.6.0.js') }}"></script>
    <div class="grid grid-cols-3 px-44 gap-10 my-10">
        <div>
            <img src="{{ asset('images/products/'.$product->photopath) }}" alt="" class="w-full h-96 object-cover rounded-lg">
        </div>
        <div class="border-l-2 px-2 col-span-2">
            <h2 class="text-3xl">{{ $product->name }}</h2>
            @if ($product->oldprice !='')
                <p class="text-red-700 line-through text-lg">Rs. {{ $product->oldprice }}/-</p>
            @endif
            <p class="text-red-700 line-through text-lg">Rs. {{ $product->price }}/-</p>
           
            <p>Quantity</p>
            <form action="{{ route('cart.store') }}" method="POST">
              @csrf
            <p class="mt-4 flex items-center">
                <span class="bg-gray-200 px-4 font-bold text-xl" onclick="subqty">-</span>
                <input class="h-11 w-12 px-0 text-center border-0 bg-gray-100" id="qty" name="qty" value="1" type="number" readonly>
                <span class="bg-gray-200 px-4 py-2 font-bold text-xl" ><button onclick="addqty()" type="button">+</button></span>
            </p>
            
            <p>In Stock:{{ $product->stock }}</p>
            
            <div class="flex items-center">
                <input type="radio" name="rating" id="star5" class="hidden" />
                <label for="star5" class="text-yellow-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                    <path d="M10 1L4.355 6.355 6 10.873 2.236 13.646 6.764 14.91 7.5 19l2.727-3.182L13.636 19l.736-4.09L17.764 14.91 15.5 10.873 17.145 6.355 11.5 1h-1z" />
                  </svg>
                </label>
                <input type="radio" name="rating" id="star4" class="hidden" />
                <label for="star4" class="text-yellow-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                    <path d="M10 1L4.355 6.355 6 10.873 2.236 13.646 6.764 14.91 7.5 19l2.727-3.182L13.636 19l.736-4.09L17.764 14.91 15.5 10.873 17.145 6.355 11.5 1h-1z" />
                  </svg>
                </label>
                <input type="radio" name="rating" id="star3" class="hidden" />
                <label for="star3" class="text-yellow-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                    <path d="M10 1L4.355 6.355 6 10.873 2.236 13.646 6.764 14.91 7.5 19l2.727-3.182L13.636 19l.736-4.09L17.764 14.91 15.5 10.873 17.145 6.355 11.5 1h-1z" />
                  </svg>
                </label>
                <input type="radio" name="rating" id="star2" class="hidden" />
                <label for="star2" class="text-yellow-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                    <path d="M10 1L4.355 6.355 6 10.873 2.236 13.646 6.764 14.91 7.5 19l2.727-3.182L13.636 19l.736-4.09L17.764 14.91 15.5 10.873 17.145 6.355 11.5 1h-1z" />
                  </svg>
                </label>
                <input type="radio" name="rating" id="star1" class="hidden" />
                <label for="star1" class="text-yellow-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                    <path d="M10 1L4.355 6.355 6 10.873 2.236 13.646 6.764 14.91 7.5 19l2.727-3.182L13.636 19l.736-4.09L17.764 14.91 15.5 10.873 17.145 6.355 11.5 1h-1z" />
                  </svg>
                </label>
              </div>
              

            <div class="mt-14">
           
                
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <button type="submit" class="bg-indigo-600 text-white py-2 px-6 rounded-lg shadow">Add to Cart</button>
            
              
              </div>
            </form>

        </div>

    </div>
    <div class="px-44 my-10">
        <h2 class="font-bold text-2xl">About this product</h2>
        <p>{{ $product->description }}</p>
    </div>


    <script>
      var quantity=document.getElementById('qty');

      function addqty(){
      let qty=quantity.value;
      qty++;
      quantity.value=qty;
      }
      function subqty(){
      let qty=quantity.value;
      qty--;
      quantity.value=qty;
      }
    </script>
@endsection