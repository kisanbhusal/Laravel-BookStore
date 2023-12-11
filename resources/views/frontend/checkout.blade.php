@extends('frontend.layouts.maincontainer')
@section('main-container')
@include('frontend.message')
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
  <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="container">
      <div class="row">
          <div class="col-xl-12">
              <div class="hero-cap text-center">
                  <h2>Checkout</h2>
              </div>
          </div>
      </div>
  </div>
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="https://media.istockphoto.com/id/1346036453/photo/books-bookcase-shop-self-background.jpg?s=612x612&w=0&k=20&c=YnstZbm2jFkLKAEbDLBNhJPw8vhEQB75VS98srT0SrU=">
        
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form id="orderform" class="row contact_form" action="{{ route('order.store') }}" method="post" novalidate="novalidate">
              @csrf
              <div class="col-md-6 form-group p_star">Name
                <input type="text" class="form-control" 
               value="{{ auth()->user()->name }}" placeholder="Full Name" name="person_name" />
               
              </div>
              
              {{-- <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
              </div> --}}

              

              <div class="col-md-6 form-group p_star">Address
                <input type="text" class="form-control" 
               value="{{ auth()->user()->address }}" placeholder="Addreess" name="shipping_address" />
                
              </div>

              <div class="col-md-6 form-group p_star">Phone.No
                <input type="text" class="form-control" 
               value="{{ auth()->user()->phone }}" placeholder="Phone" name="phone" />
                
              </div>

              @if($carts->isEmpty())
                <div class="alert alert-danger">
                 Your cart is empty. Please add items to the cart to proceed with the payment.
              </div>
              @else
                <input type="hidden" id="payment_method" name="payment_method" value="COD">
                <button type="submit" class="btn_3">Proceed to Pay</button>
                <button type="button" id="payment-button" class="btn_3">Pay with Khalti</button>
            @endif

             

              
                  {{-- <input type="hidden" id="payment_method" name="payment_method" value="COD">
                  <button type="submit" class="btn_3">Proceed to Pay</button>
                  <button type="button" id="payment-button" class="btn_3">Pay with Khalti</button> --}}
                 
              
            </div>
            </form>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->


 {{-- khalti payment --}}

 <script>
  var config = {
      // replace the publicKey with yours
      "publicKey": "test_public_key_528353ae85714ffb90ef926d2986a83b",
      "productIdentity": "1234567890",
      "productName": "Dragon",
      "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
      "paymentPreference": [
          "KHALTI",
          "EBANKING",
          "MOBILE_BANKING",
          "CONNECT_IPS",
          "SCT",
          ],
      "eventHandler": {
          onSuccess (payload) {
              // hit merchant api for initiating verfication
              console.log(payload);
             
              $.ajax({
                   method: 'POST',
                   url: "{{ route('khalti.verify') }}",
                   data: {
                       _token: "{{ csrf_token() }}",
                       data: payload,
                   },
                   dataType: 'json',
                   success: function(response) {
                       // Handle the success response

                       console.log('Successfull');
                       $('#payment_method').val('Khalti');
                      $('#orderform').submit();
                      //  window.location.href = response.redirect;

                   },
                   error: function(xhr, status, error) {
                       // Handle the error
                       console.log(error);
                   }
               });
           
          },
          onError (error) {
              console.log(error);
          },
          onClose () {
              console.log('widget is closing');
          }
      }
  };

  var checkout = new KhaltiCheckout(config);
  var btn = document.getElementById("payment-button");
  btn.onclick = function () {
      // minimum transaction amount must be 10, i.e 1000 in paisa.
      checkout.show({amount: 1000});
  }
</script>
 
 {{-- <script>
   var config = {
       // replace the publicKey with yours
       "publicKey": "test_public_key_528353ae85714ffb90ef926d2986a83b",
       "productIdentity": "1234567890",
       "productName": "Dragon",
       "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
       "paymentPreference": [
           "KHALTI",
           "EBANKING",
           "MOBILE_BANKING",
           "CONNECT_IPS",
           "SCT",
           ],
          "eventHandler": {
           onSuccess(payload) {
               // hit merchant api for initiating verfication
               console.log(payload);

               $.ajax({
                   type: 'POST',
                   url: "",
                   data: {
                       _token: "{{ csrf_token() }}",
                       data: payload,
                   },
                   dataType: 'json',
                   success: function(response) {
                       // Handle the success response

                       console.log(response);

                       window.location.href = response.redirectto;

                   },
                   error: function(xhr, status, error) {
                       // Handle the error
                       console.log(error);
                   }
               });
           },
           onError(error) {
               console.log(error);
           },
           onClose() {
               console.log('widget is closing');

           }
       }
   };

   var checkout = new KhaltiCheckout(config);
   var btn = document.getElementById("payment-button");
   btn.onclick = function() {
       // minimum transaction amount must be 10, i.e 1000 in paisa.
       checkout.show({
           amount: 1000;
       });
   }
</script> --}}
@endsection

  