@extends('layouts.main')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
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
				
                <form action="{{route('push', Auth::User()->id)}}" method="post">
                    
				<!-- row -->
				<div class="row">
				    <div class="col-md-7 mx-auto">
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

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
                                <label class="mt-1">First Name</label>
                                <input class="input" type="text" value="{{$user->first_name}}" placeholder="First Name">
							</div>
							<div class="form-group">
                                <label class="mt-1">Last Name</label>
                                <input class="input" type="text" value="{{$user->last_name}}" placeholder="First Name">
							</div>
							<div class="form-group">
                                <label class="mt-1">Email</label>
                                <input class="input" type="email" value="{{$user->email}}" placeholder="Email">
							</div>
							<div class="form-group">
                                <label class="mt-1">Address</label>
                                <input class="input" type="text" value="{{$user->address}}" placeholder="Address">
							</div>
							<div class="form-group">
                                <label class="mt-1">Phone Number <i>(For MPESA or DPO Payment)</i></label>
                                <input class="input" type="text" value="{{$user->phone}}" placeholder="Phone">
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<!-- <div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Shiping address</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Ship to a diffrent address?
								</label>
								<div class="caption">
									<div class="form-group">
										<input class="input" type="text" name="first-name" placeholder="First Name">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="last-name" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Address">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="city" placeholder="City">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="country" placeholder="Country">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
									</div>
									<div class="form-group">
										<input class="input" type="tel" name="tel" placeholder="Telephone">
									</div>
								</div>
							</div>
						</div> -->
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" name="order_notes" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
					            <span style="display:none">
                                    {{$price_n[] = 0}}
                                @foreach($carts as $cart)
                                @foreach($products as $product)
                                 @if($product->id == $cart->product_id)
                                       {{$price_n[] = $product->product_new_price}}
                                @endif
                                @endforeach
                                @endforeach
                                </span>
                                
					    @if(array_sum($price_n)<=0)
                            <div class="order-col alert alert-danger" style="margin-top:3vh;margin-bottom:3vh;"> There is nothing to Check Out. Please <a href="{{url('/')}}">Click here</a> to shop</div>
                        @else
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
                                <span style="display:none">
                                    {{$price_new[] = 0}}
                                 </span>
                                @foreach($carts as $cart)
                                @foreach($products as $product)
                                 @if($product->id == $cart->product_id)
								<div class="order-col">
									<div>{{$product->product_name}}</div>
									<div>KES {{number_format($product->product_new_price)}}</div>
								</div>
                                    <span style="display:none">
                                       {{$price_new[] = $product->product_new_price}}
                                    </span>
                                @endif
                                @endforeach
                                @endforeach
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">KES {{number_format(array_sum($price_new))}}</strong></div>
                                <input type="hidden" name="checkout_amount" value="{{array_sum($price_new)}}">
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" checked required name="payment" id="mpesa" value="mpesa">
								<label for="mpesa">
									<span></span>
									Lipa Na Mpesa
								</label>
								<div class="caption">
									<p>You will receive a notification on your phone to pay for the products.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" required name="payment" id="dpo">
								<label for="dpo">
									<span></span>
									DPO Pay
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<button type="submit" class="primary-btn order-submit" style="width:100%">Place order</button>
						@endif
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
            </form>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection