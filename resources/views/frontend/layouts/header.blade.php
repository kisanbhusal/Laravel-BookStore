<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Online Bookstore </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/img/favicon.ico')}}">
        <link rel="stylesheet" href="{{asset('mycss/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-96c5fNqhz3L1JLLqE1ODmV3FnhoKT5DzQqH+X56E9lFwoP4p12wJ5UewtJw9XJw5" crossorigin="anonymous"></script>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/slicknav.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome-all.min.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   </head>

   <body>
       
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBropSOXSURyY9BdxEmog1_SfiWgqgRJrgCw&usqp=CAU" alt="" class="mx-500 my-500 h-500 rounded-md shadow-lg shadow-red-300">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    
    <header>
        <!-- Header Start -->
       <div class="header-area ">
            <div class="main-header  shadow-red-300">
                
               <div class="header-bottom px-0 header-sticky ">
                    <div class="container-fluid bg-gray-200 "  >
                        <div class="row align-items-center">
                          
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="{{ route('index') }}"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBropSOXSURyY9BdxEmog1_SfiWgqgRJrgCw&usqp=CAU" alt=""   width="50" height="50" ></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                              
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>                                                
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="{{ route('index') }}">Home</a></li>
                                            @foreach ($categories as $category )
                                            <li><a href="{{ route('category.product',$category->name) }}">{{$category->name}}</a></li>
                                            @endforeach
                                            

                                            <li class="nav-item dropdown " >
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Pages
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a style="padding: 10px;" class="dropdown-item" href="/frontend/about">About us</a>
                                                    <a style="padding: 10px;" class="dropdown-item" href="/frontend/contact">Contact us</a>
                                                    <a style="padding: 10px;" class="dropdown-item" href="{{ route('cart') }}">Card</a>
                                                   
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            
                            <div class="col-xl-5 col-lg-8 col-md-7 col-sm-3  ">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between row align-items-center">
                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right ">
                                            <form action="{{ route('frontend.search') }}" method="GET">
                                                @csrf 
                                                <input type="text" name="searchtext" placeholder="Search products">
                                                <div class="search-icon">
                                                    <button type="submit">
                                                        <i class="fas fa-search special-tag"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                     </li>
                                  `
                                  
                                    
                                    <li>@auth
                                        
                                    
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('cart') }}">
                                              <i class="fas fa-shopping-cart"></i>
                                              <span class="badge badge-light">{{ $itemincart }}</span>
                                            </a>
                                          </li>
                                          @endauth
                                    </li>
                                    
                                    @if(auth()->user())
                                    <a href="{{ route('userprofile',auth()->user()->id) }}">Hello {{ auth()->user()->name }}</a>
                                    <form class="inline" action="{{route('logout')}}" method="POST">
                                            @csrf
                                            <button type="submit" style="background-color: white; color: black;"><i class="fas fa-sign-out-alt"></i>Logout</button>
                        
                                    </form>
                                    @else
                                   <li class="d-none d-lg-block"> <a href="{{ route('userlogin') }}" ><img src="https://cdn-icons-png.flaticon.com/128/295/295128.png" alt="" width="50px" height="50px"></a></li>
                                   
                                   
                                   @endif
                                  
                                </ul>
                                
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div> 
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
    