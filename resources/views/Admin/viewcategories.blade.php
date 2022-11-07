@extends('layouts.adminmain')
@section('content')
<div class="content-wrapper pt-5 pb-3">
    <div class="container-fluid table-responsive">
        <div class="card">
            <div class="card-header">
                <h5>All Categories</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-stripped table-hover table-bordered table-sm">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Code</th>
                        <th scope="col">Number of Products in Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($categories->isEmpty())
                        <tr>
                        <td colspan="3"><div class="alert alert-danger text-center">No Data Found.</div></td>
                        </tr>
                        @else
                        @foreach($categories as $category)
                        <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->category_code}}</td>
                        <td>{{$category->no_of_products}}</td>
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