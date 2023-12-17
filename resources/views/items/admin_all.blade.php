<!-- resources/views/items/all.blade.php -->
@extends('layout')
@section('content')
    <div class="container mt-5">
        <h2>Items</h2>

        <form action="{{ route('items.admin_all') }}" class="form-inline" method="GET">
            <div class="form-group mb-2">
                <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                <input type="text" class="form-control" id="filter" name="filter" placeholder="Item name..."
                       value="{{ $filter ?? '' }}">
            </div>
            <button type="submit" class="btn btn-secondary mb-2">Filter</button>
        </form>
        <div class="container mt-5">
            <h2>Items</h2>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>@sortablelink('name', 'Name')</th>
                    <th>@sortablelink('price', 'Price')</th>
                    <th>@sortablelink('available_amount', 'Available Amount')</th>
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
