<!-- resources/views/orders/details.blade.php -->
@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Order Details</h2>
        <h3>Order Information</h3>
        <table class="table">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $order->status }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $order->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $order->updated_at }}</td>
            </tr>
            </tbody>
        </table>

        <h3>User Information</h3>
        <table class="table">
            <tbody>
            <tr>
                <th>User ID</th>
                <td>{{ $order->user->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $order->user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $order->user->email }}</td>
            </tr>
            </tbody>
        </table>

        <h3>Address Information</h3>
        <table class="table">
            <tbody>
            <tr>
                <th>Street</th>
                <td>{{ $order->address->street }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{ $order->address->city }}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{ $order->address->state }}</td>
            </tr>
            <tr>
                <th>Zip Code</th>
                <td>{{ $order->address->zip_code }}</td>
            </tr>
            </tbody>
        </table>

        <h3>Order Items</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @forelse($order->items as $item)
                <tr>
                    <td>{{ $item->item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->item->price }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No items in this order.</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            @if($order->items->isNotEmpty())
                <tr>
                    <td colspan="2"><strong>Total Price:</strong></td>
                    <td>{{ $order->items->sum(function ($item) { return $item->quantity * $item->item->price; }) }}</strong></td>
                </tr>
            @endif

            </tfoot>
        </table>
    </div>
@endsection
