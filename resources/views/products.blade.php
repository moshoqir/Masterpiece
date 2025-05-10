@extends('layouts.home-layout')

@section('content')
    <section class="products-section spad">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="section-title ">

                        <h2 class="mt-5">OUR PRODUCTS</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 ">
                        <div class="product-item">
                            <div class="pi-pic">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                @else
                                    <img src="img/no-image.jpg" alt="{{ $product->name }}">
                                @endif
                                <div class="pi-links">
                                    <a href="#" class="add-card" data-product-id="{{ $product->id }}">
                                        <i class="fas fa-shopping-bag"></i>
                                        <span>ADD TO CART</span>
                                    </a>
                                </div>
                            </div>
                            <div class="pi-text">
                                <h6>{{ number_format($product->price, 2) }}JOD</h6>
                                <p>{{ $product->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </section>
@endsection
