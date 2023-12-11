<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>This is home page</title>
    <link rel="stylesheet" href="{{asset('mycss/style.css')}}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>

<div class="sticky top-0 ">
 <nav class="navbar" >
        <ul class = "menu" >
            <nav class="bg-gray border-gray-200 dark:bg-gray-900 dark:border-gray-700">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                  <a href="#" class="flex items-center">
                      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBropSOXSURyY9BdxEmog1_SfiWgqgRJrgCw&usqp=CAU" class="h-10 mr-3" alt="" />
                      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Book Store</span>
                  </a>
                  {{-- <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                  </button> --}}
                  <div class="hidden w-full md:block md:w-auto " id="navbar-dropdown" >
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-blue-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                      <li>
                        <a href="/" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
                      </li>
                      {{-- @foreach ($categories as $category )
                      <li><a href="/">{{$category->name}}</a></li>
                      @endforeach --}}
                      <li>
                        <a href="/about" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About us</a>
                      </li>
                      
                      <li>
                        <a href="/contact" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                      </li>
                      <div class="flex md:order-2">
                        <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1" >
                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                          <span class="sr-only">Search</span>
                        </button>
                        <div class="relative hidden md:block">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Search icon</span>
                          </div>
                          <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                        </div>
                        <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
                          <span class="sr-only">Open menu</span>
                          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        </button>
                      </div>
                        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                          <div class="relative mt-3 md:hidden">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                              <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                          </div>
                         
                    </ul>
                  </div>
                  @if (auth()->user())
                  <div>
                  <a href="">{{ auth()->user()->name }}</a>
                  <form action="inline" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                  
                  </form>
                  <a href="{{ route('cart.index') }}">My Cart</a>
                  </div>
                </div>
                @else
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a href="{{ route('login') }}" class="btn header-btn">Sign in</a></button>
               
                @endif
              </nav>
              
  
          {{-- <li><a href="/home">Home</a></li>
            @foreach ($categories as $category )
            <li><a href="/">{{$category->name}}</a></li>
            @endforeach
           
            <li><a href="/welcome">Home</a></li> --}}
            
        </ul>
    </nav>
</div>
  
    @yield('content')

    
<footer>
  <div class="mx-auto w-full max-w-screen-xl py-2 my-6 bg-blue-200 p-6 rounded-lg shadow-lg">
    <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
      <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
              <li class="mb-4">
                  <a href="/about" class=" hover:underline">About</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Careers</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Brand Center</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Blog</a>
              </li>
          </ul>
      </div>
      <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Help center</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
              <li class="mb-4">
                  <a href="#" class="hover:underline">Discord Server</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Twitter</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Facebook</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Contact Us</a>
              </li>
          </ul>
      </div>
      <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
              <li class="mb-4">
                  <a href="#" class="hover:underline">Privacy Policy</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Licensing</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Terms &amp; Conditions</a>
              </li>
          </ul>
      </div>
      <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Download</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
              <li class="mb-4">
                  <a href="#" class="hover:underline">iOS</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Android</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Windows</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">MacOS</a>
              </li>
          </ul>
      </div>
  </div>
  
  </div>
</footer>

    
</body>
</html>