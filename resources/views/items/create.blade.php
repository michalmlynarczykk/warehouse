@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Add New Item</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('items.create.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step=0.01 class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="available_amount" class="form-label">Available Amount</label>
                <input type="number" class="form-control" id="available_amount" name="available_amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Item</button>
        </form>
    </div>
@endsection
