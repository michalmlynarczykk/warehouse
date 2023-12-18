<!-- resources/views/orders/all.blade.php -->
@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Orders</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>@sortablelink('status', 'Status')</th>
                <th>@sortablelink('created_at', 'Created At')</th>
                <th>@sortablelink('updated_at', 'Updated At')</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>
                        <a href="{{ route('orders.details', $order->id) }}" class="btn btn-info">Details</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No orders found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $orders->links('pagination::simple-bootstrap-4') }}
        </div>

        <div class="d-flex justify-content-center mt-1">
        </div>
    </div>
@endsection
