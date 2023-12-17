<!-- resources/views/items/all.blade.php -->

@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Items</h2>

        <form action="{{ route('items.all') }}" class="form-inline" method="GET">
            <div class="form-group mb-2">
                <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                <input type="text" class="form-control" id="filter" name="filter" placeholder="Item name..."
                       value="{{ $filter ?? '' }}">
            </div>
            <button type="submit" class="btn btn-secondary mb-2">Filter</button>
        </form>

        <form action="{{ route('order.create') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>@sortablelink('name', 'Name')</th>
                    <th>@sortablelink('price', 'Price')</th>
                    <th>@sortablelink('available_amount', 'Available Amount')</th>
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

            <div class="d-flex justify-content-center">
                {{ $items->links('pagination::simple-bootstrap-4') }}
            </div>

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
