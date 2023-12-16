<!-- resources/views/items/all.blade.php -->

@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>All Items</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(auth()->check())
            <div class="mb-3">
                @if(auth()->user()->role === \App\Models\Roles::USER)
                    <a href="{{ route('order.create') }}" class="btn btn-success">Place Order</a>
                @elseif(auth()->user()->role === \App\Models\Roles::ADMIN)
                    <a href="{{ route('items.create') }}" class="btn btn-primary">Add New Item</a>
                @endif
            </div>
        @endif

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
                    @if(auth()->check() && auth()->user()->role === \App\Models\Roles::USER)
                        <td>
                            <input type="number" name="order_quantity_{{ $item->id }}" value="0" min="0"
                                   max="{{ $item->available_amount }}">
                        </td>
                    @else
                        <td>N/A</td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="5">No items found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $items->links('pagination::simple-bootstrap-4') }}
        </div>
    </div>
@endsection
