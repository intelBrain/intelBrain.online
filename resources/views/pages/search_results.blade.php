@extends('layouts.main')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Search Results</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{url('/')}}">Home</a></li>
							<li class="active">Search Results (Found: {{$products_search->count()}} Products)</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto">
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
							<div class="products-tabs col-md-12">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
									    @if(isset($products_search) && $products_search->count()>0)
										@foreach($products_search as $product)
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
												<form action="{{route('cart', [Auth::user()->id, $product->id])}}" method="post">
													@csrf
													<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
												</form>
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
										@else
										Product Not found
										@endif
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection