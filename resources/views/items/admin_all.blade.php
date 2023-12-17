<!-- resources/views/items/all.blade.php -->

@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Items</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Available Amount</th>
            </tr>
            </thead>
            <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->available_amount }}</td>
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

        <a class="d-flex justify-content-center mt-1" href="{{ route('items.create') }}">
            <button type="submit" class="btn btn-success">Add new item</button>
        </a>
    </div>
@endsection
