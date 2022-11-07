@extends('layouts.main')
@section('content')
<!-- SECTION -->

		<div class="section">
			<!-- container -->
			<div class="container">
				<div class="row">
				<div class="col-md-6 mx-auto">
					@if(session()->has('message'))
					{{$errclass=''}}
					<span style="display:none">
						@if(str_contains(session('message'), 'Removed'))
						{{ $errclass='alert-danger'}}
						@else
						{{ $errclass='alert-success'}}
						@endif
					</span>
						<div class="alert {{$errclass}} alert-dismissible show mb-2 mt-2" role="alert"  id="mydiv">
							{{session('message')}}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
				</div>
			</div>
		
				<!-- row -->
				<div class="row">
					<!-- shop -->
					@foreach($categories as $category)
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{URL::asset('uploads/'.$category->category_image)}}" alt="">
							</div>
							<div class="shop-body">
								<h3>{{$category->category_name}}<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					@endforeach
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									@foreach($categories as $category)
									<span style="display:none;">
										@if($category->id == 1)
										{{ $class = 'active'}}
										@else
										{{ $class = ''}}
										@endif
									</span>
									<li class="{{$class}}"><a data-toggle="tab" href="#tab{{$category->id}}">{{$category->category_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										@foreach($products as $product)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												@foreach($images as $image)
												@if($product->id == $image->item_id)
												<img src="{{URL::asset('uploads/'.$image->filename)}}" alt="">
												@break
												@endif
												@endforeach
												<div class="product-label">
													<span class="sale">-{{$product->discount}}%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												@foreach($categories as $category)
												@if($product->category_id == $category->id)
												<p class="product-category">{{$category->category_name}}</p>
												@endif
												@endforeach
												<h3 class="product-name"><a href="#">{{$product->product_name}}</a></h3>
												<h4 class="product-price">KES {{number_format($product->product_new_price)}}
													@if($product->discount>0)
													<del class="product-old-price">KES {{number_format($product->product_old_price)}}</del>
													@endif
												</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<a href="{{route('productdetails', $product->id)}}" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a>
												</div>
											</div>
											<div class="add-to-cart">
												@auth
												@if(Auth::User()->active == 1)
												<form action="{{route('cart', [Auth::user()->id, $product->id])}}" method="post">
													@csrf
													<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
												</form>
												@else
												<p style="color:#fff">Account is Inactive</p>
												@endif
												@endauth
												@guest
												<button type="submit" class="add-to-cart-btn" onclick="event.preventDefault(); document.getElementById('login-form').submit();"><i class="fa fa-shopping-cart"></i> add to cart</button>
													<form id="login-form" action="{{ route('login') }}" method="GET">
														@csrf
													</form>
													@endguest
											</div>
										</div>
										<!-- /product -->
										@endforeach
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-2">
										@foreach($products as $product)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												@foreach($images as $image)
												@if($product->id == $image->item_id)
												<img src="{{URL::asset('uploads/'.$image->filename)}}" alt="">
												@break
												@endif
												@endforeach
												<div class="product-label">
													<!-- <span class="sale">-{{$product->discount}}%</span> -->
													<span class="new">TOP</span>
												</div>
											</div>
											<div class="product-body">
												@foreach($categories as $category)
												@if($product->category_id == $category->id)
												<p class="product-category">{{$category->category_name}}</p>
												@endif
												@endforeach
												<h3 class="product-name"><a href="#">{{$product->product_name}}</a></h3>
												<h4 class="product-price">KES {{number_format($product->product_new_price)}}
													@if($product->discount>0)
													<del class="product-old-price">KES {{number_format($product->product_old_price)}}</del>
													@endif
												</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												@auth
												@if(Auth::User()->active == 1)
												<form action="{{route('cart', [Auth::user()->id, $product->id])}}" method="post">
													@csrf
													<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
												</form>
												@else
												<p style="color:#fff">Account is Inactive</p>
												@endif
												@endauth
												@guest
												<button type="submit" class="add-to-cart-btn" onclick="event.preventDefault(); document.getElementById('login-form').submit();"><i class="fa fa-shopping-cart"></i> add to cart</button>
													<form id="login-form" action="{{ route('login') }}" method="GET">
														@csrf
													</form>
													@endguest
											</div>
										</div>
										<!-- /product -->
										@endforeach
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product07.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product08.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product09.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product01.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product02.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product03.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product04.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product05.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product06.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product07.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product08.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product09.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product01.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product02.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product03.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product04.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product05.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('assets/img/product06.png')}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">KES 98,000 <del class="product-old-price">KES 99,000</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection