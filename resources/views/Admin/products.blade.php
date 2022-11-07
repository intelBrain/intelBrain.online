@extends('layouts.adminmain')
@section('content')
<div class="content-wrapper pt-5 pb-3">
    <div class="container-fluid table-responsive">
        <div class="card">
            <div class="card-header">
                <h5>All Products</h5>
            </div>
            <div class="card-body table-responsive">
            <div class="row">
            <div class="col-md-6 mx-auto">
                @if(session()->has('message'))
                {{$errclass=''}}
                <span style="display:none">
                    @if(str_contains(session('message'), 'no'))
                    {{ $errclass='alert-danger'}}
                    @else
                    {{ $errclass='alert-success'}}
                    @endif
                </span>
                    <div class="alert {{$errclass}} alert-dismissible fade show mb-2 mt-2" role="alert"  id="mydiv">
                        {{session('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            </div>
                <table class="table table-stripped table-hover table-bordered table-sm">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Code</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Product Details</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Product Original Price</th>
                        <th scope="col">Price After Discount</th>
                        <th scope="col">Category ID</th>
                        <th scope="col">Product Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($products->isEmpty())
                        <tr>
                        <td colspan="7"><div class="alert alert-danger text-center">No Data Found.</div></td>
                        </tr>
                        @else
                        @foreach($products as $product)
                        <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_code}}</td>
                        <td>
                            {{substr($product->product_description,0,25)}}...<a href="" data-toggle="modal" data-target="#descriptionModal<?php echo $product->id?>">Read More</a>
                            <!-- Description Modal -->
                            <div class="modal fade" id="descriptionModal<?php echo $product->id?>" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel<?php echo $product->id?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="descriptionModalLabel">Description for {{ $product->product_name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="white-space: pre-line;">
                                            <div class="container mx-auto">{{$product->product_description}}</div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{$product->product_details}}</td>
                        <td>{{$product->discount}}</td>
                        <td>{{$product->product_old_price}}</td>
                        <td>{{$product->product_new_price}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>
                            @if($product->active == '0')
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#activate<?php echo $product->id?>">
                                Inactive
                            </button>
                            <!-- Activate Modal -->
                        <div class="modal fade" id="activate<?php echo $product->id?>" tabindex="-1" role="dialog" aria-labelledby="activateLabel<?php echo $product->id?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="activate">Activate product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 Are you sure you want to activate {{ $product->product_name}}?
                                 <p>
                                    <i>When you activate a product, it will be seen in the index page</i>
                                 </p>
                            </div>
                            <div class="modal-footer">
                            <form id="activate-form" action="{{ route('activate_product', $product->id) }}" method="POST">
                                    @csrf
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Leave as is</button>
                                <button type="submit" class="btn btn-primary">Yes, Activate</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                            @else
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#deactivate<?php echo $product->id?>">
                                Active
                            </button>
                            <!-- Activate Modal -->
                        <div class="modal fade" id="deactivate<?php echo $product->id?>" tabindex="-1" role="dialog" aria-labelledby="deactivateLabel<?php echo $product->id?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="activate">Deactivate product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 Are you sure you want to deactivate {{ $product->product_name}}?
                                 <p>
                                    <i>When you de-activate a product, it will not be seen in the index page</i>
                                 </p>
                            </div>
                            <div class="modal-footer">
                                <form id="activate-form" action="{{ route('deactivate_product', $product->id) }}" method="POST">
                                    @csrf
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Leave as is</button>
                                <button type="submit" class="btn btn-primary">Yes, Deactivate</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                            @endif
                        </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection