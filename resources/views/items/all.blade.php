<!-- resources/views/items/all.blade.php -->

@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Items</h2>

        <form action="{{ route('order.create') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Available Amount</th>
                    <th>Order Quantity</th>
                </tr>
                </thead>
                <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->available_amount }}</td>
                        <td>
                            <input type="number" name="order_items[{{ $item->id }}][quantity]" value="0" min="0"
                                   max="{{ $item->available_amount }}">
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No items found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <!-- Add fields for Address model -->
            <div class="mb-3">
                <label for="street" class="form-label">Street:</label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State:</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>

            <div class="mb-3">
                <label for="zip_code" class="form-label">Zip Code:</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" required>
            </div>

            <div class="d-flex justify-content-center mt-1">
                <button type="submit" class="btn btn-success">Place Order</button>
            </div>
        </form>
    </div>
@endsection
