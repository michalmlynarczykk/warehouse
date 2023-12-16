@extends('layout')

@section('title', 'User Home')

@section('content')
    <div class="container mt-5">
        <h1>Warehouse</h1>

        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Available</th>
                </tr>
                </thead>
{{--                <tbody>--}}
{{--                     @foreach($items as $item)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $item->name }}</td>--}}
{{--                            <td>{{ $item->price }}</td>--}}
{{--                            <td>--}}
{{--                                <input type="number" name="available_amount[{{ $item->id }}]" value="0" min="0" max="{{ $item->available_amount }}">--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}

            </table>
        </div>

        <a href="" class="btn btn-success">Add product</a> <a href="" class="btn btn-success">Delete product</a>
    </div>
@endsection

