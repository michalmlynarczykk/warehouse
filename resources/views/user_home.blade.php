@extends('layout')

@section('title', 'User Home')

@section('content')
    <div class="container mt-5">
        <h1>Cześć!</h1>
<!-- dopisac action-->
        <form method="post">
            @csrf
            <div class="table-responsive mt-4">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Produkt</th>
                        <th>Cena</th>
                        <th>Dostępność</th>
                        <th>ilosc</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- add datebase-->
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary">Submit Order</button>
        </form>
    </div>
@endsection

