<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>IntelBrain - Online Laptop Shop</title>
	  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/intelbrain_logo_trans.png')}}">
      <!-- Google font -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
      <!-- Bootstrap -->
      <link type="text/css" rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
      <!-- Slick -->
      <link type="text/css" rel="stylesheet" href="{{asset('assets/css/slick.css')}}"/>
      <link type="text/css" rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}"/>
      <!-- nouislider -->
      <link type="text/css" rel="stylesheet" href="{{asset('assets/css/nouislider.min.css')}}"/>
      <!-- Font Awesome Icon -->
      <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
      <!-- Custom stlylesheet -->
      <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <!-- HEADER -->
      <header>
         <!-- TOP HEADER -->
         <div id="top-header">
            <div class="container">
               <ul class="header-links pull-left">
                  <li><a href="#"><i class="fa fa-phone"></i>+254 718 006908</a></li>
                  <li><a href="#"><i class="fa fa-envelope-o"></i> info@intelbrain.com</a></li>
                  <li><a href="#"><i class="fa fa-map-marker"></i> Parklands, Nairobi</a></li>
               </ul>
               @auth
               <ul class="header-links pull-right">
                  <li><a href="#"><i class="fa fa-user"></i> {{Auth::User()->first_name}} {{Auth::User()->last_name}}</a></li>
                  <!--<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>-->
                  <li>
                     <a href="" data-toggle="modal" data-target="#logoutModal">
                     <i class="fa fa-sign-out fa-sm fa-fw mr-2 text-gray-400"></i>
                     Logout
                     </a>
                     <!-- Logout Modal-->
                     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">Select "Logout" below if you are ready to end your current session. This will sign you out of the system. Proceed?</div>
                              <div class="modal-footer">
                                 <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                                 <a class="btn btn-primary btn-sm" href="#"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 {{ __('Logout') }}
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
               @endauth
               @guest
               <ul class="header-links pull-right">
                  <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login</a></li>
                  <li><a href="{{route('register')}}"><i class="fa fa-user-plus"></i> Register</a></li>
               </ul>
               @endguest
            </div>
         </div>
         <!-- /TOP HEADER -->
         <!-- MAIN HEADER -->
         <div id="header">
            <!-- container -->
            <div class="container">
               <!-- row -->
               <div class="row">
                  <!-- LOGO -->
                  <div class="col-md-3">
                     <div class="header-logo">
                        <a href="{{url('/')}}" class="logo">
                        <img src="{{asset('assets/img/intelbrain_logo_trans.png')}}" alt="" width="150px">
                        </a>
                     </div>
                  </div>
                  <!-- /LOGO -->
                  <!-- SEARCH BAR -->
                  <div class="col-md-6">
                     <div class="header-search">
                        <form action="{{route('search')}}" method="get">
                            @csrf
                           <select class="input-select" name="category_id">
                              <option value="">All Categories</option>
                              @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->category_name}}</option>
                              @endforeach
                           </select>
                           <input type="search" class="input" placeholder="Search Product" name="search">
                           <button type="submit" class="search-btn">Search</button>
                        </form>
                     </div>
                  </div>
                  <!-- /SEARCH BAR -->
                  <!-- ACCOUNT -->
                  <div class="col-md-3 clearfix">
                     <div class="header-ctn">
                        @auth
                        @if(Auth::User()->active == 1)
                        <!-- Wishlist -->
                        <div>
                           <a href="#">
                              <i class="fa fa-heart-o"></i>
                              <span>Your Wishlist</span>
                              <div class="qty">0</div>
                           </a>
                        </div>
                        <!-- /Wishlist -->
                        <!-- Cart -->
                        <div class="dropdown">
                           <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                              <i class="fa fa-shopping-cart"></i>
                              <span>Your Cart</span>
                              <div class="qty">
                                  @auth
                                  <span style="display:none">
                                    {{$myProd[] = 0}}
                                    @foreach($carts as $cart)
                                    @if($cart->user_id == Auth::User()->id)
                                    {{$myProd[] = $cart->user_id}}
                                    @endif
                                    @endforeach
                                 </span>
                                    @if(is_array($myProd))
                                    @if(sizeof($myProd) >= 1)
                                        {{count($myProd)-1}}
                                    @endif
                                    @endif
                                 @endauth
                              </div>
                           </a>
                           <div class="cart-dropdown" style="left:-120px;z-index:9999">
                              <div class="cart-list">
                                  <span style="display:none">
                                    {{$price[] = 0}}
                                 </span>
                                 @foreach($carts as $cart)
                                 @foreach($products as $product)
                                 @if($product->id == $cart->product_id)
                                 @if($cart->user_id == Auth::User()->id)
                                 <div class="product-widget">
                                    <div class="product-img">
                                    @foreach($images as $image)
												@if($product->id == $image->item_id)
												<img src="{{URL::asset('uploads/'.$image->filename)}}" alt="">
												@break
												@endif
												@endforeach
                                    </div>
                                    <div class="product-body">
                                       <h3 class="product-name"><a href="{{route('productdetails', $product->id)}}">{{$product->product_name}}</a></h3>
                                       <h4 class="product-price"><span class="qty">1x</span>KES {{number_format($product->product_new_price)}}</h4>
                                    </div>
                                    <form action="{{route('delcart', $cart->id)}}" method="post">
													@csrf
													<button type="submit" class="delete"><i class="fa fa-close"></i></button>
												</form>
                                    <span style="display:none">
                                       {{$price[] = $product->product_new_price}}
                                    </span>
                                 </div>
                                 @endif
                                 @endif
                                 @endforeach
                                 @endforeach
                              </div>
                              <div class="cart-summary">
                                 <small>
                                     @if(is_array($myProd))
                                    @if(sizeof($myProd) >= 1)
                                        {{count($myProd)-1}}
                                    @endif
                                    @endif
                                    Item(s) selected</small>
                                 <h5>SUBTOTAL: KES {{number_format(array_sum($price))}}</h5>
                              </div>
                              <div class="cart-btns">
                                 <a href="{{url('/#tab1')}}">Add Product</a>
                                 @if((count($myProd)-1)<=0)
                                 
                                 @else
                                 <a href="{{route('checkout', Auth::User()->id)}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <!-- /Cart -->
                        @else
                        <div>
                        <span style="color:#fff">Please ask Admin to activate your account in order to shop with us</span>
                        </div>
                        @endif
                        @endauth
                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                           <a href="#">
                           <i class="fa fa-bars"></i>
                           <span>Menu</span>
                           </a>
                        </div>
                        <!-- /Menu Toogle -->
                     </div>
                  </div>
                  <!-- /ACCOUNT -->
               </div>
               <!-- row -->
            </div>
            <!-- container -->
         </div>
         <!-- /MAIN HEADER -->
      </header>
      <!-- /HEADER -->
      <!-- NAVIGATION -->
      <nav id="navigation">
         <!-- container -->
         <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
               <!-- NAV -->
               <ul class="main-nav nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Hot Deals</a></li>
                  <li><a href="#">Categories</a></li>
                  <li><a href="#">Laptops</a></li>
                  <li><a href="#">Smartphones</a></li>
                  <li><a href="#">Cameras</a></li>
                  <li><a href="#">Accessories</a></li>
               </ul>
               <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
         </div>
         <!-- /container -->
      </nav>
      <!-- /NAVIGATION -->
      @yield('content')
      <!-- NEWSLETTER -->
      <div id="newsletter" class="section">
         <!-- container -->
         <div class="container">
            <!-- row -->
            <div class="row">
               <div class="col-md-12">
                  <div class="newsletter">
                     <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                     <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                     </form>
                     <ul class="newsletter-follow">
                        <li>
                           <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- /row -->
         </div>
         <!-- /container -->
      </div>
      <!-- /NEWSLETTER -->
      <!-- FOOTER -->
      <footer id="footer">
         <!-- top footer -->
         <div class="section">
            <!-- container -->
            <div class="container">
               <!-- row -->
               <div class="row">
                  <div class="col-md-3 col-xs-6">
                     <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>IntelBrain designs, develops, delivers, and supports business and technology solutions using best-of-breed platforms for business process management and digital transformation.</p>
                        <ul class="footer-links">
                           <li><a href="#"><i class="fa fa-map-marker"></i>Parklands, Nairobi</a></li>
                           <li><a href="#"><i class="fa fa-phone"></i>+254 718 006908</a></li>
                           <li><a href="#"><i class="fa fa-envelope-o"></i>info@intelbrain.com</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3 col-xs-6">
                     <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                           <li><a href="#">Hot deals</a></li>
                           <li><a href="#">Laptops</a></li>
                           <li><a href="#">Smartphones</a></li>
                           <li><a href="#">Cameras</a></li>
                           <li><a href="#">Accessories</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="clearfix visible-xs"></div>
                  <div class="col-md-3 col-xs-6">
                     <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                           <li><a href="#">About Us</a></li>
                           <li><a href="#">Contact Us</a></li>
                           <li><a href="#">Privacy Policy</a></li>
                           <li><a href="#">Orders and Returns</a></li>
                           <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3 col-xs-6">
                     <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                           <li><a href="#">My Account</a></li>
                           <li><a href="#">View Cart</a></li>
                           <li><a href="#">Wishlist</a></li>
                           <li><a href="#">Track My Order</a></li>
                           <li><a href="#">Help</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- /row -->
            </div>
            <!-- /container -->
         </div>
         <!-- /top footer -->
         <!-- bottom footer -->
         <div id="bottom-footer" class="section">
            <div class="container">
               <!-- row -->
               <div class="row">
                  <div class="col-md-12 text-center">
                     <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                     </ul>
                     <span class="copyright">
                        <!-- Link back to IntelBrain can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Created with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://IntelBrain.com" target="_blank" style="color:#349DD7">IntelBrain</a>
                        <!-- Link back to IntelBrain can't be removed. Template is licensed under CC BY 3.0. -->
                     </span>
                  </div>
               </div>
               <!-- /row -->
            </div>
            <!-- /container -->
         </div>
         <!-- /bottom footer -->
      </footer>
      <!-- /FOOTER -->
      <!-- jQuery Plugins -->
      <script src="{{asset('assets/js/jquery.min.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js/slick.min.js')}}"></script>
      <script src="{{asset('assets/js/nouislider.min.js')}}"></script>
      <script src="{{asset('assets/js/jquery.zoom.min.js')}}"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>
   </body>
</html>