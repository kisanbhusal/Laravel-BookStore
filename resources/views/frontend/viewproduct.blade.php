@extends('frontend.layouts.maincontainer')
@section('main-container')
@include('frontend.message')

<div class="container ">
  <form action="{{ route('cart.store') }}" method="POST">
    @csrf
    <div class="row py-5">
      <div class="col-md-4">
        <img src="{{ asset('images/products/'.$product->photopath) }}" alt="" class="w-100 h-96 object-cover rounded-lg">
      </div>
      <div class="col-md-8">
        <p class="text-2xl">Product Name:<span style="font-size:17px;">{{ $product->name }}</span></p>
        <p class="text-2xl">Language:<span style="font-size:17px;">{{ $product->language }}</span></p>
        <p class="text-2xl">Catrgory:<span style="font-size:17px;">{{ $product->category->name }}</span></p>
        <p class="text-2xl">Author:<span style="font-size:17px;">{{ $product->author->name }}</p>
        <p class="text-2xl">Published By:<span style="font-size:17px;">{{ $product->publisher->name }}</span></p>
        @if ($product->oldprice !='')
          <p class="text-red-700 line-through text-lg">Price Rs. {{ $product->oldprice }}/-</p>
        @endif
        <p class="text-red-700  text-lg">Price Rs. {{ $product->price }}/-</p>
       
        <p>Quantity</p>
        
          <p class="mt-4 d-flex align-items-center">
            <span class="bg-gray-200 px-4 font-bold text-xl" onclick="subqty()">-</span>
            <input class="h-11 w-12 px-0 text-center border-0 bg-gray-100" id="qty" name="qty" value="1" type="number" readonly>
            <span class="bg-gray-200 px-4  font-bold text-xl"><button onclick="addqty()" type="button">+</button></span>
          </p>
          
          <p>In Stock:<span style="font-size:17px;">{{ $product->stock }}</span></p>
          
         
          
          <div class="mt-14">
           
            {{-- @foreach ($carts as $cart)
            @php
                $prd = Product::find($cart->product_id);
                $cartQuantity = $cart->qty;
            @endphp
            
            @if ($prd->stock <= 0)
                <button type="button" class="bg-indigo-600 text-white py-2 px-6 rounded-lg shadow" disabled>Add to Cart</button>
                <p class="error-message">Order out of stock.</p>
            @else
                @if ($prd->stock < $cartQuantity)
                    <button type="button" class="bg-indigo-600 text-white py-2 px-6 rounded-lg shadow" disabled>Add to Cart</button>
                    <p class="error-message">Order quantity is less than cart quantity.</p>
                @else
                   
                        <input type="hidden" name="product_id" value="{{ $prd->id }}">
                        <button type="submit" class="bg-indigo-600 text-white py-2 px-6 rounded-lg shadow">Add to Cart</button>
                    
                @endif
            @endif
        @endforeach --}}
        


            @if($product->stock<=0)
              <button type="submit" class="bg-indigo-600 text-white py-2 px-6 rounded-lg shadow" disabled>Add to Cart</button>
              <p class="error-message">Order out of stock.</p>
            
            @else
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="bg-indigo-600 text-white py-2 px-6 rounded-lg shadow">Add to Cart</button>
            
            @endif
          </div>
      </div>
    </div>
    <div class="container px-44 my-10">
      <h2 class="font-bold text-2xl">About this product</h2>
      <p>{{ $product->description }}</p>
    </div>
    <p class="bg-red-200 px-4  font-bold text-xl">Related Products</p>
    <div class="tab-pane fade show active" style="margin-bottom: 3rem;" id="nav-home" role="tabpanel"                  aria-labelledby="nav-home-tab">
      <div class="grid grid-cols-4  gap-4">
                  @foreach($relatedproducts as $relatedproduct)
                  <div class="col">
                      <a href="{{route('viewproduct', $relatedproduct->id)}}">
                        <div class="card bg-gray-100 rounded-lg shadow-lg " onmouseover="this.style.transform = 'scale(1.05)'; this.style.transition = 'transform 0.3s ease';" onmouseout="this.style.transform = 'scale(1)'; this.style.transition = 'transform 0.3s ease';" style="height: 450px;">
                          <img src="{{asset('images/products/'.$relatedproduct->photopath)}}" alt="" class="img-fluid w-full max-h-80 object-cover" style="height: 300px;">
                          <div class="card-body">
                            <h5 class="card-title font-weight-bold">Product Name:{{ $relatedproduct->name }}</h5>

                            <p class="card-text font-weight-bold">
                              @if($relatedproduct->oldprice !='')
                                <span class="text-secondary text-decoration-line-through">{{ $relatedproduct->oldproduct }}</span>
                              @endif
                              Rs.{{$relatedproduct->price}}/-
                            </p>
                          </div>
                          @if($relatedproduct->oldprice !='')
                            @php
                              $discount = ($relatedproduct->oldprice - $relatedproduct->price) / $relatedproduct->oldprice * 100;
                            @endphp
                            <p class="position-absolute top-0 end-0 bg-primary text-white rounded-lg px-4 py-1">{{ $discount }}% off</p>
                          @endif
                        </div>
                      </a>
                    </div>
                  @endforeach
                  
              </div>
          </div>
      </div>
      <!-- End Nav Card -->
  </div>
  </form>

  </div>
  

  
  <script>
    var stock = {{ $product->stock }}; // Get the stock value from the server-side (e.g., using PHP or JavaScript)

  function addqty() {
    var qtyInput = document.getElementById('qty');
    var qtyValue = parseInt(qtyInput.value);

    if (qtyValue < stock) {
      qtyInput.value = qtyValue + 1;
    }
  }

  function subqty() {
    var qtyInput = document.getElementById('qty');
    var qtyValue = parseInt(qtyInput.value);

    if (qtyValue > 1) {
      qtyInput.value = qtyValue - 1;
    }
  }
  
  
  </script>
 @endsection 