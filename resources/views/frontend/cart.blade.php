@extends('frontend.layouts.maincontainer')
@section('main-container')
@include('frontend.message')
  <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="container">
      <div class="row">
          <div class="col-xl-12">
              <div class="hero-cap text-center">
                  <h2>Card List</h2>
              </div>
          </div>
      </div>
  </div>
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsQesMwv4guVEnka-Kz9aykqdCc9qFg3CeHinGXEtR0JXHSJQj93SyNuaTeI7Rn9GdF90&usqp=CAU">
       
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $totalprice = 0;
              @endphp
              
                @foreach($carts as $cart)
                
              <td><img class="w-14" src="{{ asset('images/products/'.$cart->product->photopath) }}" alt=""></td>
                  
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <h5 class="card-title font-weight-bold">{{ $cart->product->name }}</h5>
                    </div>
                    {{-- <div class="media-body">
                      <p>Minimalistic shop for multipurpose use</p>
                    </div> --}}
                  </div>
                </td>
                <td>
                  <h5 class="">Rs.<span  id="rate{{ $cart->id }}">{{$cart->product->price}}</span>/-</h5>
                </td>
                <form action="{{ route('cart.update',$cart->id) }}" method="POST" id="updateform">
                  @csrf
                <td>
                  <p class="mt-4 d-flex align-items-center">
                    <span class="bg-gray-200 px-4 font-bold text-xl" onclick="subqty('{{ $cart->id }}')">-</span>
                    <input class="h-11 w-12 px-0 text-center border-0 bg-gray-100" id="qty{{ $cart->id }}" name="qty" value="{{  $cart->qty  }}" type="number" readonly >
                    <span class="bg-gray-200 px-4  font-bold text-xl"><button onclick="addqty('{{ $cart->id }}')" type="button">+</button></span>

                    <input type="hidden" id="stock{{ $cart->id }}" value="{{ $cart->product->stock }}">
                    </p>
                  
                </td>
                
                <td>
                  <h5 id="total{{ $cart->id }}"> {{ $cart->product->price * $cart->qty }} </h5>
                </td>
               
                <td>
                  
                 
                  <button onclick="document.getElementById('updateform').submit();" type="submit"
                  class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Update</button>
                </form>
                  <a onclick="return confirm('Are you sure to delete?')" href="{{ route('cart.delete',$cart->id) }}"class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400">Delete</a>

                  
                    {{-- <button  type="submit"
                    class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Order</button> --}}
                  {{-- <a href="{{ route('order.store',$cart->id) }}"class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Order</a> --}}
                
                  
              </td>
                
              </tr>
              @php
                $totalprice += $cart->product->price * $cart->qty;
              @endphp

                @endforeach
              
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Grandtotal</h5>
                </td>
                <td>
                  <h5>Rs. {{ $totalprice }}</h5>
                </td>
              </tr>
             
            </tbody>
          </table>
          
         

          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{ route('index') }}">Continue Shopping</a>

           @if($carts->isEmpty())
        <button class="btn_1 checkout_btn_1" disabled>Proceed to checkout</button>
        <p class=" alert alert-danger">Your cart is empty. Please add items to your cart before proceeding to checkout.</p>
    @else
        <a class="btn_1 checkout_btn_1" href="{{ route('checkout') }}">Proceed to checkout</a>
    @endif
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
  <script>
  

  function addqty(x) {
    var qtyInput = document.getElementById('qty'+x);
    var qtyValue = parseInt(qtyInput.value);
    var stock = document.getElementById('stock'+x).value;
    if (qtyValue < stock) {
      qtyInput.value = qtyValue + 1;
      var rate = document.getElementById('rate'+x).innerHTML;
    rate = parseFloat(rate);
    document.getElementById('total'+x).innerHTML = rate*(qtyValue+1);
    var link = document.getElementById()
    }
    
  }

  function subqty(x) {
    var qtyInput = document.getElementById('qty'+x);
    var qtyValue = parseInt(qtyInput.value);

    if (qtyValue > 1) {
      qtyInput.value = qtyValue - 1;
      var rate = document.getElementById('rate'+x).innerHTML;
    rate = parseFloat(rate);
    document.getElementById('total'+x).innerHTML = rate*(qtyValue-1);
    }
    
  }

  
    
  </script>
@endsection