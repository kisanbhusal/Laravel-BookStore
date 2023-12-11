{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="grid grid-cols-2">
        <img src="https://img.freepik.com/free-vector/e-learning-smartphone-isometric_1284-22565.jpg?w=740&t=st=1685027244~exp=1685027844~hmac=86d867af3bb3bccee16fd04d92d6c91ded26a634dc5a43fa5b3daeb4b2125abd" alt="" class="h-screen">
        <div class="flex justify-center items-center">
            <div class="w-full text-center">
                <img src="https://thumbs.dreamstime.com/z/login-icon-button-vector-illustration-isolated-white-background-126999474.jpg" alt="" class="mx-auto my-8 h-60">
                <h2 class="font-bold text-4xl">Welcome to Bookstore </h2> 
                 
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Enter Email" class="p-4 rounded-lg w-8/12 my-4"> 
                    
                    <input type="password" name="password" placeholder="Enter Password" class="p-4 rounded-lg w-8/12 my-4 ">
                    
                    <input type="submit" value="Login" class="bg-blue-600 text-white w-4/12
                     py-3 mt-4 rounded-lg block mx-auto cursor-pointer">
                </form> 
            </div> 
        </div>
    </div>
</body>
</html> --}}

@extends('master')
@section('content')
<img src="https://thumbs.dreamstime.com/z/login-icon-button-vector-illustration-isolated-white-background-126999474.jpg" alt="" class="mx-auto my-8 h-40">
<form action="{{ route('login') }}" method="POST" class="w-1/2 mx-auto bg-gray-200 p-6 rounded-lg shadow-lg">
    @csrf
 <div class="mb-6">
    
      <label for="email"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
      <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email" required>
    </div>
    <div class="mb-6">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
      <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter password" required>
    </div>
    <div class="flex items-start mb-6">
      <div class="flex items-center h-5">
        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
      </div>
      <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

    <a href="{{ route('user.register') }}">Register Here</a>
  </form>
  
@endsection