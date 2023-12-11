@extends('frontend.layouts.maincontainer')
@section('main-container')

  <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>About Us</h2>
                        
                    </div>

            </div>
        </div>
    </div>
    
    <div id="carouselExample" class="carousel slide mx-4" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner ">
          <div class="carousel-item active">
            <img src="{{ asset('images/image/book1.jpg') }}" style="width: 100%; height: 700px;" class="d-block w-100" alt="Image 1">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/image/book2.jpg') }}" style="width: 100%; height: 700px;" class="d-block w-100" alt="Image 2">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/image/book4.jpg') }}" style="width: 100%; height: 700px;" class="d-block w-100" alt="Image 3">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
      
   
</div>
  </div>
  <!-- slider Area End-->
    
    <!-- product list part start-->
    <section class="about_us padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="about_us_content">
                        <h5>Our Mission</h5>
                        <h3>Our primary goal is to foster a love for reading and inspire intellectual growth among our customers. We strive to curate a collection of both popular titles and hidden gems, ensuring that readers can explore new ideas, discover different perspectives, and expand their knowledge.</h3>
                        <div class="about_us_video">
                            <img src="https://www.rd.com/wp-content/uploads/2021/05/books_quote1.jpg" alt="#" class="img-fluid">
                            <a class="about_video_icon popup-youtube" href="https://www.youtube.com/watch?v=DWHB6nTyKDI"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>Books are the carriers of civilization. Without books, history is silent, literature dumb, science crippled, thought and speculation at a standstill.</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="{{asset('frontend/assets/img/icon/feature_icon_1.svg')}}" alt="#">
                        <h4>Credit Card Support</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="{{asset('frontend/assets/img/icon/feature_icon_2.svg')}}" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="{{asset('frontend/assets/img/icon/feature_icon_3.svg')}}" alt="#">
                        <h4>Free Delivery</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="{{asset('frontend/assets/img/icon/feature_icon_4.svg')}}" alt="#">
                        <h4>Product with Gift</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->
    
    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="{{asset('frontend/assets/img/client.png')}}" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="{{asset('frontend/assets/img/client_1.png')}}" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="{{asset('frontend/assets/img/client_2.png')}}" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->

    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->

   @endsection 