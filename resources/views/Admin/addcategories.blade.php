@extends('layouts.adminmain')
@section('content')
<div class="content-wrapper pt-5 pb-3">
    <div class="container">
    <!-- Card Start -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
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

        <form action="{{route('add_category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter title">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_code">Category Code <i><b>(Automatically Generates on Refresh)</b></i></label>
                                <input type="text" class="form-control" disabled id="category_code" value="{{$code = rand(10000,99999)}}">
                                <input type="hidden" name="category_code" value="{{$code}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Category Image</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="category_image" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
                            {{ __('Add Category') }}
                        </button>
                    </div>
                </div>
            </div>
        <!-- /.card-body -->
    </div>
    </div>
</div>
@endsection