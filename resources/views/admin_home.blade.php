@extends('layout')

@section('title', 'Admin Home')

@section('content')
    <div class="container mt-5">
        <h1>Welcome, Admin!</h1>
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Użytkownik</th>
                        <th>Nazwa produktu</th>
                        <th>Ilość</th>
                        <th>Status</th>
                        <th>??</th>
                    </tr>
                </thead>
                <!-- add datebase-->
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ route('warehouse_products') }}" class="btn btn-secondary">Magazyn</a>
        </div>
    </div>
@endsection

