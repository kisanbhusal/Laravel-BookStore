<!-- Footer Start-->
<div class="footer-area py-10 pb-10 mb-2"style="background-color:#CACFCE;" style="margin: -10px;">
    <div class="container">
        <div class="row d-flex justify-content-between ">
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6 ">
               <div class="single-footer-caption mb-50 " >
                 <div class="single-footer-caption mb-30">
                      <!-- logo -->
                     <div class="footer-logo">
                        <h2>Book Store</h2>
                         {{-- <a href="index.html"><img src="{{asset('frontend/assets/img/logo/logo2_footer.png')}}" alt=""></a> --}}
                     </div>
                     <div class="footer-tittle">
                         <div class="footer-pera">
                             <p>“The more that you read, the more things you will know. ... </p>
                        </div>
                     </div>
                 </div>
               </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                <div class="single-footer-caption mb-50 ">
                    <div class="footer-tittle ">
                        <h4>Quick Links</h4>
                        <ul >
                            <li ><a  href="/frontend/about">About</a></li>
                            <li><a href="#"> Offers & Discounts</a></li>
                            <li><a href="#"> Get Coupon</a></li>
                            <li><a href="/frontend/contact">  Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
           
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                <div class="single-footer-caption mb-50">
                    <div class="footer-tittle">
                        <h4>Support</h4>
                        <ul>
                         <li><a href="#">Frequently Asked Questions</a></li>
                         <li><a href="#">Terms & Conditions</a></li>
                         <li><a href="#">Privacy Policy</a></li>
                         <li><a href="#">Privacy Policy</a></li>
                         <li><a href="#">Report a Payment Issue</a></li>
                     </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="footer-copy-right f-right">
                    <!-- social -->
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-behance"></i></a>
                        <a href="#"><i class="fas fa-globe"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer bottom -->
       
          
     </div>
    </div>

<!-- Footer End-->

</footer>
<!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('frontend/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('frontend/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/animated.headline.js')}}"></script>
    
    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('frontend/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('frontend/assets/js/contact.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/mail-script.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>

    
{{-- image slider --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
          var myCarousel = document.querySelector("#carouselExample");
          var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000 // Set the interval (in milliseconds) for auto-sliding
          });
        });
      </script>

      {{-- khalti payment --}}
      
      
 </body>
</html>