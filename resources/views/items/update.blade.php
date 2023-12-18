@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Update Item</h2>

        <form action="{{ route('items.update.put', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $item->price }}" required>
            </div>

            <div class="mb-3">
                <label for="available_amount" class="form-label">Available Amount:</label>
                <input type="text" class="form-control" id="available_amount" name="available_amount"
                       value="{{ $item->available_amount }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
@endsection
