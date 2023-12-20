@extends('layout')

@section('title', 'Warehouse Management')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h1>Welcome to Warehouse Management System</h1>
                <p class="lead">Streamline your warehouse operations with our advanced management system.</p>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h3>Key Features:</h3>
                        <ul class="list-group text-uppercase fw-bold">
                            <li class="list-group-item">items management</li>
                            <li class="list-group-item">orders management</li>
                            <li class="list-group-item">panel for customers</li>
                            <li class="list-group-item">user-friendly interface</li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <h3>Why Choose Us?</h3>
                        <p>We understand the importance of efficient warehouse management in your business. Our system is designed to optimize processes, minimize errors, and improve overall productivity.</p>
                    </div>
                </div>

                <div class="mt-4">
                    <p class="text-muted">Ready to get started? <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> now.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
