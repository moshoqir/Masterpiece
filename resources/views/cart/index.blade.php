@extends('layouts.app')

<style>
    input.item-qty::-webkit-outer-spin-button,
    input.item-qty::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
@section('content')
    <div class="container">
        <h1>Your Cart</h1>

        @if ($cartItems->count() > 0)
            <div class="cart-items">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                            width="50">
                                    @endif
                                    {{ $item->name }}
                                </td>
                                <td>{{ number_format($item->price, 2) }}JOD</td>
                                <td>
                                    <div class="quantity-buttons d-flex align-items-center">
                                        <button class="btn btn-sm btn-secondary decrease-qty"
                                            data-id="{{ $item->id }}">-</button>
                                        <input type="number" min="1" value="{{ $item->quantity }}"
                                            class="form-control form-control-sm item-qty mx-1 text-center"
                                            data-id="{{ $item->id }}" style="width: 50px; -moz-appearance: textfield;">
                                        <button class="btn btn-sm btn-secondary increase-qty"
                                            data-id="{{ $item->id }}">+</button>
                                    </div>
                                </td>
                                <td>{{ number_format($item->price * $item->quantity, 2) }}JOD</td>
                                <td>
                                    <button class="btn btn-danger btn-sm remove-item"
                                        data-id="{{ $item->id }}">Remove</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total:</strong></td>
                            <td colspan="2"><strong>{{ number_format($cartTotal, 2) }}JOD</strong></td>
                        </tr>
                    </tfoot>
                </table>

                <div class="checkout-btn">
                    <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
                </div>
            </div>
        @else
            <div class="alert alert-info">
                Your cart is empty. <a href="{{ route('productsuser') }}">Continue shopping</a>.
            </div>
        @endif
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle quantity increase
            document.querySelectorAll('.increase-qty').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const input = document.querySelector(`.item-qty[data-id="${id}"]`);
                    input.value = parseInt(input.value) + 1;
                    updateCartItem(id, input.value);
                });
            });

            // Handle quantity decrease
            document.querySelectorAll('.decrease-qty').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const input = document.querySelector(`.item-qty[data-id="${id}"]`);
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                        updateCartItem(id, input.value);
                    }
                });
            });

            // Handle quantity input change
            document.querySelectorAll('.item-qty').forEach(input => {
                input.addEventListener('change', function() {
                    const id = this.getAttribute('data-id');
                    if (parseInt(this.value) < 1) {
                        this.value = 1;
                    }
                    updateCartItem(id, this.value);
                });
            });

            // Handle remove item
            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    removeCartItem(id);
                });
            });

            // Function to update cart item
            function updateCartItem(id, quantity) {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/cart/${id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Reload the page to update totals
                            window.location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Function to remove cart item
            function removeCartItem(id) {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/cart/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Reload the page
                            window.location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>

@endsection
