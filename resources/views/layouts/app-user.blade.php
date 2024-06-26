<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Terra') }}</title>
    
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
        
        <!--====== Animate CSS ======-->
        <link rel="stylesheet" href="assets/css/animate.css">
            
        <!--====== Slick CSS ======-->
        <link rel="stylesheet" href="assets/css/slick.css">
            
        <!--====== Line Icons CSS ======-->
        <link rel="stylesheet" href="assets/css/LineIcons.css">
            
        <!--====== Bootstrap CSS ======-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <!--====== Default CSS ======-->
        <link rel="stylesheet" href="assets/css/default.css">
        
        <!--====== Style CSS ======-->
        <link rel="stylesheet" href="assets/css/style.css">
            <!-- Ionicons -->
    <link href="{{ asset('resources/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('resources/css/iziToast.min.css') }}">
    <link href="{{ asset('resources/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('resources/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.4.2/dist/cdn.min.js" defer></script>
    @yield('page_css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> 
        
    <title>@yield('title') | {{ config('app.name') }}</title>
</head>
<body>
  
      <!--====== PRELOADER PART START ======-->
      <div class="preloader">
          <div class="loader">
              <div class="ytp-spinner">
                  <div class="ytp-spinner-container">
                      <div class="ytp-spinner-rotator">
                          <div class="ytp-spinner-left">
                              <div class="ytp-spinner-circle"></div>
                          </div>
                          <div class="ytp-spinner-right">
                              <div class="ytp-spinner-circle"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--====== PRELOADER PART ENDS ======-->
      <nav class="bg-gray-900 dark:bg-gray-900 fixed w-full z-20 top-0 start-0  dark:border-gray-600 shadow-xl">
        @include('elements.header')
    </nav>
  
      <!--====== HEADER PART START ======-->
  
      <section class="header_area">
          <div class="header_navbar">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12">
                          <nav class="navbar navbar-expand-lg">
                              <a class="navbar-brand" href="index.html">
                                  <img src="assets/images/logo.svg" alt="Logo">
                              </a>
                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                  <span class="toggler-icon"></span>
                                  <span class="toggler-icon"></span>
                                  <span class="toggler-icon"></span>
                              </button>
  
                              <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                  <ul id="nav" class="navbar-nav ml-auto">
                                      <li class="nav-item active">
                                          <a class="page-scroll" href="#home">Home</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="page-scroll" href="#about">About</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="page-scroll" href="#gallery">Gallery</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="page-scroll" href="#menu">Menu</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="page-scroll" href="#upcoming">Updates</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="page-scroll" href="#contact">Contact</a>
                                      </li>
                                  </ul>
                              </div> <!-- navbar collapse -->
                          </nav> <!-- navbar -->
                      </div>
                  </div> <!-- row -->
              </div> <!-- container -->
          </div> <!-- header navbar -->
  
          <div id="home" class="header_slider slider-active">
              <div class="single_slider bg_cover d-flex align-items-center" style="background-image: url(assets/images/slider-1.jpg)">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-9">
                              <div class="slider_content">
                                  <h2 class="slider_title">You are Using Free Lite Version of Cafe</h2>
                                  <p class="wow fadeInUp">Please, purchase full version to get all sections, features and commercial license for footer credit removal.</p>
                                  <a href="https://rebrand.ly/cafe-ud" rel="nofollow" class="main-btn">Purchase Now</a>
                              </div> <!-- slider content -->
                          </div>
                      </div> <!-- row -->
                  </div> <!-- container -->
              </div> <!-- single slider -->
          </div> <!-- header slider -->
      </section>
  
      <!--====== HEADER PART ENDS ======-->
      
      <!--====== COFFEE PART START ======-->
  
      <section id="coffee" class="coffee_area pt-120">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <div class="section_title text-center pb-30">
                          <h4 class="title">Our Specials</h4>
                          <span class="line">
                              <span class="box"></span>
                          </span>
                      </div> <!-- section title -->
                  </div>
              </div> <!-- row -->
              <div class="row justify-content-center">
                  <div class="col-lg-4 col-md-7 col-sm-9">
                      <div class="single_coffee text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                          <div class="coffee_image">
                              <img src="assets/images/coffee-1.jpg" alt="coffee">
                          </div>
                          <div class="coffee_content">
                              <h4 class="coffee_title">Cocktail</h4>
                              <p>Lorem Ipsum is fgrsimply dummy of the printing He is good mam industry been printing  good  industry .</p>
                          </div>
                      </div> <!-- single coffee -->
                  </div>
                  <div class="col-lg-4 col-md-7 col-sm-9">
                      <div class="single_coffee text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                          <div class="coffee_image">
                              <img src="assets/images/coffee-2.jpg" alt="coffee">
                          </div>
                          <div class="coffee_content">
                              <h4 class="coffee_title">Vanilla</h4>
                              <p>Lorem Ipsum is fgrsimply dummy of the printing He is good mam industry been printing  good  industry .</p>
                          </div>
                      </div> <!-- single coffee -->
                  </div>
                  <div class="col-lg-4 col-md-7 col-sm-9">
                      <div class="single_coffee text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                          <div class="coffee_image">
                              <img src="assets/images/coffee-3.jpg" alt="coffee">
                          </div>
                          <div class="coffee_content">
                              <h4 class="coffee_title">Black</h4>
                              <p>Lorem Ipsum is fgrsimply dummy of the printing He is good mam industry been printing  good  industry .</p>
                          </div>
                      </div> <!-- single coffee -->
                  </div>
              </div> <!-- row -->
          </div> <!-- container -->
      </section>
  
      <!--====== COFFEE PART ENDS ======-->
      
      <!--====== ABOUT PART START ======-->
  
      <section id="about" class="about_area pt-120 pb-130">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <div class="section_title text-center pb-10">
                          <h4 class="title">Our Story</h4>
                          <span class="line">
                              <span class="box"></span>
                          </span>
                      </div> <!-- section title -->
                  </div>
              </div> <!-- row -->
              <div class="row align-items-center">
                  <div class="col-lg-6">
                      <div class="about_image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                          <img src="assets/images/about.jpg" alt="about">
                      </div> <!-- about image -->
                  </div>
                  <div class="col-lg-6">
                      <div class="about_content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                          <h4 class="about_title">About Coffee Shop</h4>
                          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr. <br> <br> Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                          <ul class="social">
                              <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                              <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                              <li><a href="#"><i class="lni lni-instagram-original"></i></a></li>
                              <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                          </ul>
                      </div> <!-- row -->
                  </div>
              </div> <!-- row -->
          </div> <!-- container -->
      </section>
  
      <!--====== ABOUT PART ENDS ======-->
      
      <!--====== COUNTER PART START ======-->
  
      <section id="counter" class="counter_area pt-50 pb-95 bg_cover text-center" style="background-image: url(assets/images/counter_bg.jpg)">
          <div class="container">
              <div class="row">
                  <div class="col-md-4 col-sm-12">
                      <div class="single_counter mt-30 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.2s">
                          <span class="count"><span class="counter">36546</span></span>
                          <p>Coffee Served</p>
                      </div> <!-- single counter -->
                  </div>
                  <div class="col-md-4 col-sm-12">
                      <div class="single_counter mt-30 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.5s">
                          <span class="count"><span class="counter">28</span></span>
                          <p>Type of Coffees</p>
                      </div> <!-- single counter -->
                  </div>
                  <div class="col-md-4 col-sm-12">
                      <div class="single_counter mt-30 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.8s">
                          <span class="count"><span class="counter">12</span></span>
                          <p>Team Members</p>
                      </div> <!-- single counter -->
                  </div>
              </div> <!-- row -->
          </div> <!-- container -->
      </section>
  
      <!--====== COUNTER PART ENDS ======-->
      
      <!--====== CUSTOMER PART START ======-->
  
      <section id="customer" class="customer_area pt-120">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <div class="section_title text-center pb-30">
                          <h4 class="title">Customers Feedback</h4>
                          <span class="line">
                              <span class="box"></span>
                          </span>
                      </div> <!-- section title -->
                  </div>
              </div> <!-- row -->
              <div class="row customer_active">
                  <div class="col-lg-6">
                      <div class="single_customer d-sm-flex align-items-center mt-30">
                          <div class="customer_image">
                              <img src="assets/images/customer-1.jpg" alt="customer">
                          </div>
                          <div class="customer_content media-body">
                              <div class="customer_content_wrapper media-body">
                                  <h5 class="author_name">Justyna Helen</h5>
                                  <span class="sub_title">Coffee Lover</span>
                                  <p>Lorem ipsum dolor sit amdi scing elitr, sed diam nonumy eirmo tem invidunt ut labore etdolo magna aliquyam erat, sed diam voluptua. At vero eos et accusam.</p>
                                  <ul class="star">
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                  </ul>
                              </div>
                          </div>
                      </div> <!-- single customer -->
                  </div>
                  <div class="col-lg-6">
                      <div class="single_customer d-sm-flex align-items-center mt-30">
                          <div class="customer_image">
                              <img src="assets/images/customer-2.jpg" alt="customer">
                          </div>
                          <div class="customer_content media-body">
                              <div class="customer_content_wrapper media-body">
                                  <h5 class="author_name">Fajar Siddiq</h5>
                                  <span class="sub_title">Coffee Enthusiast</span>
                                  <p>Lorem ipsum dolor sit amdi scing elitr, sed diam nonumy eirmo tem invidunt ut labore etdolo magna aliquyam erat, sed diam voluptua. At vero eos et accusam.</p>
                                  <ul class="star">
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                  </ul>
                              </div>
                          </div>
                      </div> <!-- single customer -->
                  </div>
                  <div class="col-lg-6">
                      <div class="single_customer d-sm-flex align-items-center mt-30">
                          <div class="customer_image">
                              <img src="assets/images/customer-3.jpg" alt="customer">
                          </div>
                          <div class="customer_content media-body">
                              <div class="customer_content_wrapper media-body">
                                  <h5 class="author_name">Rob Hope</h5>
                                  <span class="sub_title">Enthusiasts</span>
                                  <p>Lorem ipsum dolor sit amdi scing elitr, sed diam nonumy eirmo tem invidunt ut labore etdolo magna aliquyam erat, sed diam voluptua. At vero eos et accusam.</p>
                                  <ul class="star">
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                      <li><i class="lni lni-star-filled"></i></li>
                                  </ul>
                              </div>
                          </div>
                      </div> <!-- single customer -->
                  </div>
              </div> <!-- row -->
          </div> <!-- container -->
      </section>
  
      <!--====== CUSTOMER PART ENDS ======-->
      
      <!--====== GALLERY PART START ======-->
  
      <section id="gallery" class="gallery_area pt-120 pb-130">
  
  
      </section>
  
      <!--====== GALLERY PART ENDS ======-->
      
      <!--====== COFFEE MENU PART START ======-->
  
      <section id="menu" class="coffee_menu pt-120 pb-130 bg_cover" style="background-image: url(assets/images/coffee_menu_bg.jpg)">
  
                      <div class="container">
                      <div class="row">
                          <div class="col-md-12">
                              <div>
                                  <h2>You are Using Free Lite Version of Cafe</h2>
                                  <p class="wow fadeInUp">Please, purchase full version to get all sections, features and commercial license for footer credit removal.</p>
                                  </br>
                                  <a href="https://rebrand.ly/cafe-ud" rel="nofollow" class="main-btn">Purchase Now</a>
                              </div> <!-- slider content -->
                          </div>
                      </div> <!-- row -->
                  </div> <!-- container -->
  
      </section>
  
      <!--====== COFFEE MENU PART ENDS ======-->
      
      <!--====== upcoming PART START ======-->
  
      <section id="upcoming" class="upcoming_area pt-120">
      </section>
  
      <!--====== upcoming PART ENDS ======-->
      
      <!--====== CONTACT PART START ======-->
  
      <section id="contact" class="contact_area">
          <div class="contact_form pt-120 pb-130">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-lg-6">
                          <div class="section_title text-center pb-30">
                              <h4 class="title">Get In Touch</h4>
                              <span class="line">
                                  <span class="box"></span>
                              </span>
                          </div> <!-- section title -->
                      </div>
                  </div> <!-- row -->
                  <form id="contact-form" action="assets/contact.php" method="post">
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="single_form mt-30">
                                  <input name="name" type="text" placeholder="Name">
                              </div> <!-- single form -->
                          </div>
                          <div class="col-lg-6">
                              <div class="single_form mt-30">
                                  <input name="email" type="email" placeholder="Email">
                              </div> <!-- single form -->
                          </div>
                          <div class="col-lg-12">
                              <div class="single_form mt-30">
                                  <input name="subject" type="text" placeholder="Subject">
                              </div> <!-- single form -->
                          </div>
                          <div class="col-lg-12">
                              <div class="single_form mt-30">
                                  <textarea name="message" placeholder="Message"></textarea>
                              </div> <!-- single form -->
                          </div>
                          <p class="form-message"></p>
                          <div class="col-lg-12">
                              <div class="single_form text-center mt-30">
                                  <button class="main-btn">SUBMIT</button>
                              </div> <!-- single form -->
                          </div>
                      </div> <!-- row -->
                  </form>
              </div> <!-- container -->
          </div> <!-- contact form -->
          <div class="contact_map">
              <div class="gmap_canvas">                            
                  <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
              </div>
          </div> <!-- contact map -->
      </section>
  
      <!--====== CONTACT PART ENDS ======-->
      
      <!--====== FOOTER PART START ======-->
  
      <section id="footer" class="footer_area">
          <div class="footer_subscribe pt-80">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-lg-6">
                          <div class="subscribe_title mt-45">
                              <h4 class="title">Subscribe Our Newsletter</h4>
                              <p>To recieve monthly updates</p>
                          </div> <!-- subscribe title -->
                      </div>
                      <div class="col-lg-6">
                          <div class="subscribe_form mt-50">
                              <form action="#">
                                  <input type="email" placeholder="Enter Your Email">
                                  <button><i class="lni lni-envelope"></i></button>
                              </form>
                          </div> <!-- subscribe title -->
                      </div>
                  </div> <!-- row -->
              </div> <!-- contact form -->
          </div> <!-- footer subscribe  -->
          
          <div class="footer_widget pt-80 pb-130">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-4 col-md-4 order-md-1 order-lg-1">
                          <div class="footer_about mt-45">
                              <h4 class="footer_title">About Us</h4>
                              <p>Lorem ipsum dolor sit amet, csadipscing elitr, sed diam nonumy eirmod teeinidunt ut labore et dolore magna aliquam erat, sed diam voluptua. At vero.</p>
                              <ul class="social">
                                  <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                  <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                                  <li><a href="#"><i class="lni lni-instagram-original"></i></a></li>
                                  <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                              </ul>
                          </div> <!-- footer about -->
                      </div>
                      <div class="col-lg-4 order-md-3 order-lg-2">
                          <div class="footer_link_wrapper d-flex flex-wrap">
                              <div class="footer_link mt-45">
                                  <h4 class="footer_title">Opening Hours</h4>
                                  <ul>
                                      <li>Mon-Fri: 08.00 A.M - 10.00 P.M</li>
                                      <li>Saturday: 08.00 A.M - 02.00 P.M</li>
                                      <li>Sunday: Closed</li>
                                      <li>Half-Holidays: 08.00 A.M - 02.00 P.M</li>
                                      <li>Twe: 08.00 A.M - 02.00 P.M</li>
                                  </ul>
                              </div> <!-- footer link -->
                          </div> <!-- footer link wrapper -->
                      </div>
                      <div class="col-lg-4 col-md-4 order-md-2 order-lg-3">
                          <div class="footer_instagram mt-45">
                              <h4 class="footer_title">Instagram Feed</h4>
                              <div class="instagram_image">
                                  <a href="#"><img src="assets/images/instagram-1.jpg" alt="instagram"></a>
                                  <a href="#"><img src="assets/images/instagram-2.jpg" alt="instagram"></a>
                                  <a href="#"><img src="assets/images/instagram-3.jpg" alt="instagram"></a>
                                  <a href="#"><img src="assets/images/instagram-4.jpg" alt="instagram"></a>
                                  <a href="#"><img src="assets/images/instagram-4.jpg" alt="instagram"></a>
                                  <a href="#"><img src="assets/images/instagram-3.jpg" alt="instagram"></a>
                                  <a href="#"><img src="assets/images/instagram-2.jpg" alt="instagram"></a>
                                  <a href="#"><img src="assets/images/instagram-1.jpg" alt="instagram"></a>
                              </div>
                          </div> <!-- footer instagram -->
                      </div>
                  </div> <!-- row -->
              </div> <!-- contact form -->
          </div> <!-- footer Widget -->
          
          <div class="footer_copyright">
              <div class="container">
                  <div class="copyright text-center">
                      <p>Designed and Developed by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                  </div> <!-- copyright -->
              </div> <!-- contact form -->
          </div> <!-- footer copyright -->
          
          <div class="footer_shape">
              <img src="assets/images/footer_shape.png" alt="footer shape">
          </div> <!-- footer shape -->
      </section>  
    <script src="{{mix('js/app.js')}}" ></script>
      <!--====== Jquery js ======-->
      <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
      <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
      
      <!--====== Bootstrap js ======-->
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      
      <!--====== Slick js ======-->
      <script src="assets/js/slick.min.js"></script>
      
      
      <!--====== Scrolling Nav js ======-->
      <script src="assets/js/jquery.easing.min.js"></script>
      <script src="assets/js/scrolling-nav.js"></script>
      
      <!--====== WOW js ======-->
      <script src="assets/js/wow.min.js"></script>
      
      <!--====== Main js ======-->
      <script src="assets/js/main.js"></script>
</body>
</html>
