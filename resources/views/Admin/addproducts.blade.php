@extends('layouts.adminmain')
@section('content')
<div class="content-wrapper pt-5 pb-3">
    <div class="container">
    <!-- Card Start -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="container">
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

        <form action="{{route('add_product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter title">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_brand">Product Brand</label>
                                <input type="text" class="form-control" name="product_brand" id="product_brand" placeholder="Enter Product Brand/Model">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_description">Product Description</label>
                                <textarea class="form-control" name="product_description" id="product_description" placeholder="Enter Product Description as it will appear on Index Page" rowspan="5"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_details">Product Details</label>
                                <textarea  class="form-control" name="product_details" id="product_details" placeholder="Enter Product Details" rowspan="4"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_of_products">Number of Units</label>
                                <input type="number"  class="form-control" name="no_of_products" id="no_of_products" placeholder="Enter Number of Units" min="1">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_code">Product Code <i><b>(Automatically Generates on Refresh)</b></i></label>
                                <input type="text" class="form-control" disabled id="product_code" value="{{$code = rand(10000000,99999999)}}">
                                <input type="hidden" name="product_code" value="{{$code}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_old_price">Product Price</label>
                                <input type="text" class="form-control" name="product_old_price" id="product_old_price" placeholder="Enter Product Price">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount">Product % Discount</label>
                                <input type="number" class="form-control" name="discount" id="discount" min="0" max="100" placeholder="Enter Discount for this Product" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id">Product Category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option>--SELECT CATEGORY--</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Product Images</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="product_images[]" id="exampleInputFile" multiple>
                                    <label class="custom-file-label" for="exampleInputFile">Choose files</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Product') }}
                        </button>
                    </div>
                </div>
            </div>
        <!-- /.card-body -->
    </div>
    </div>
</div>
@endsection