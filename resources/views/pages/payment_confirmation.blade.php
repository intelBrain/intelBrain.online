@extends('layouts.main')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Payment Confirmation</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="{{route('checkout', Auth::User()->id)}}">Checkout</a></li>
							<li class="active">Payment Confirmation</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mb-2" role="alert" style="background:green;">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
                Payment Confirmed, thank you for shopping with us
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection