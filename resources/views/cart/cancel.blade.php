@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-warning">
            <h1>Payment Cancelled</h1>
            <p>Your payment has been cancelled. Your cart items are still saved.</p>
            <a href="{{ route('cart.show') }}" class="btn btn-primary">Return to Cart</a>
        </div>
    </div>
@endsection
