@extends('frontend.layouts.maincontainer')
@section('main-container')
<img src="https://thumbs.dreamstime.com/z/login-icon-button-vector-illustration-isolated-white-background-126999474.jpg" alt="" class="mx-auto my-8 h-40">
<form action="{{ route('login') }}" method="POST" class="w-1/2 mx-auto bg-gray-200 p-6 rounded-lg shadow-lg">
    @csrf
 <div class="mb-6">
    
      <label for="email"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
      <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email" required>
    </div>
    @error('email')
    <p>{{ $message }}</p>
      
    @enderror
    <div class="mb-6">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
      <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter password" required>
    </div>
    
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

    <a href="{{ route('user.register') }}" class="text-red">Register Here</a>
    <div>
      <a href="{{ route('password.request') }}">Forgot Password</a>
    </div>
  </form>
  
@endsection