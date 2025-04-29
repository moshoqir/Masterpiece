@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-success">
            <h1>Payment Successful!</h1>
            <p>Thank you for your purchase. Your order has been processed successfully.</p>
            <a href="/productsuser" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
@endsection
