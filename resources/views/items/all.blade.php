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
                    <th>Order</th>
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
                        <td>
                            <input type="checkbox" name="order_items[{{ $item->id }}][checked]"
                                   value="{{ $item->id }}">
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

            <div class="d-flex justify-content-center mt-1">
                <button type="submit" class="btn btn-success">Place Order</button>
            </div>

        </form>
    </div>
@endsection
