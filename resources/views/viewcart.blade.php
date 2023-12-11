@extends('master')
@section('content')
@include('layouts.message')
  <h2 class="text-center font-bold text-3xl">Items in Cart</h2>

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

 








@endsection