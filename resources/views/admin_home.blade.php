@extends('layout')

@section('title', 'Admin Home')

@section('content')
    <div class="container mt-5">
        <h1>Welcome, Admin!</h1>
        <div class="row mt-4">
            <div class="col-md-4">
                <a href="{{ route('add.product') }}" class="btn btn-primary btn-lg btn-block">Add Product</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('delete.product') }}" class="btn btn-danger btn-lg btn-block">Delete Product</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('view.orders') }}" class="btn btn-info btn-lg btn-block">View Orders</a>
            </div>
        </div>
    </div>
@endsection

