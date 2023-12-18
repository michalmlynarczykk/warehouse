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
                    <th>Actions</th>
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
                            <a href="{{ route('items.update', $item->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('items.delete', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
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

            <div class="d-flex justify-content-center mt-1">
                <a href="{{ route('items.create') }}" class="btn btn-success btn-block">Add new item</a>
            </div>
        </div>
@endsection
