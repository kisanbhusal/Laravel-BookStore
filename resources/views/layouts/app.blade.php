<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('datatable/jquery-3.6.0.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('datatable/datatables.css') }}">
        <script src="{{ asset('datatable/datatables.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    </head>
    <body class="font-sans antialiased">
        <div class="flex">
            <div class="w-56 fixed top-0 bottom-0 block px-1 py-0 bg-gray-400 text-black shadow-lg shadow-red-300" >
    
            
            <div>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBropSOXSURyY9BdxEmog1_SfiWgqgRJrgCw&usqp=CAU" alt="" class="mx-auto my-4 h-40 rounded-md shadow-lg shadow-red-300">
                
                <a href="/dashboard" class="text-xl font-bold border-blue-500  block ml-4 px-2 py-1 hover:bg-blue-500 hover:text-white dashboard-link"> <i class="fas fa-home"></i> Dashboard </a>
    
                <a href="{{ route('Categories.index')}}" class="text-xl font-bold border-blue-500 block ml-4 px-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-list"></i> Categories</a>
    
                <a href="{{ route('author.index') }}" class="text-xl font-bold border-blue-500 block ml-4 px-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-pen-to-square"></i> Author</a>

                <a href="{{ route('publisher.index') }}" class="text-xl font-bold border-blue-500 block ml-4 px-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-building"></i> Publisher</a>
               
                <a href="{{ route('product.index') }}" class="text-xl font-bold border-blue-500 block ml-4 px-2 py-1 hover:bg-blue-500 hover:text-white"> <i class="fas fa-box"></i> Product</a>

                <a href="{{ route('orders.index') }}" class="text-xl font-bold border-blue-500 block ml-4 px-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-shopping-cart"></i> Orders</a>
                
                <a href="{{ route('users.index') }}" class="text-xl font-bold border-blue-500 block ml-4 px-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-users"></i> Users</a>

                <a href="{{ route('adminprofile.index') }}" class="text-xl font-bold border-blue-500 block ml-4 px-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-user"></i> Profile</a>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xl font-bold border-blue-500 block ml-4 px-2 py-1 hover:bg-blue-500 hover:text-white">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
                
            </div>
           </div>
           <div class="p-4 flex-1 pl-56 left-0 ">
            @yield('content')
           </div>
           </div>
    </body>
</html>
