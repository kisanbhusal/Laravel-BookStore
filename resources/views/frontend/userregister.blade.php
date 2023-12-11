@extends('frontend.layouts.maincontainer')
@section('main-container')
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiqdyfq5NNxAXVmNN5IPhmUMPYjVfDvYcgCg&usqp=CAU" alt="" class="mx-auto my-8 h-40">
<form action="{{ route('users.store') }}" method="POST" class="w-1/2 mx-auto bg-gray-200 p-6 rounded-lg shadow-lg">
    @csrf
    <div class="mb-6">
    
        <label for="name"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Name</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your name" required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
      </div>

      <div class="mb-6">
    
        <label for="phone"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
        <input type="text" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" placeholder="Enter your phone number" required>
        @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
      </div>

      <div class="mb-6">
    
        <label for="address"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
        <input type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter your address" required>
        @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
      </div>
 <div class="mb-6">
    
      <label for="email"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
      <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror" value="{{ old('email') }}"  placeholder="Enter your email" required>
      @error('address')
      <div class="invalid-feedback">{{ $message }}</div>
  @enderror
    </div>
    <div class="mb-6">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
      <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror" placeholder="Enter password" required>
      @error('password')
       <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-6">
    
        <label for="password"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
        <input type="password" id="confirm_password" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Confirm your password" required>
      </div>
    
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

   
  </form>
  
@endsection