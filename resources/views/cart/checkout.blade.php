@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Checkout</h1>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order Summary</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ number_format($item->price, 2) }}JOD</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->price * $item->quantity, 2) }}JOD</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                                    <td><strong>{{ number_format($cartItems->sum(function ($item) {return $item->price * $item->quantity;}),2) }}JOD</strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Payment</div>
                    <div class="card-body">
                        <form action="{{ route('checkout.stripe') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block">Pay with Stripe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
