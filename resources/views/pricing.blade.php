@extends('layouts.home-layout')

@section('content')
    <section class="pricing-section spad">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="section-title">
                        <h2>CHOOSE YOUR PACKAGE</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($packages as $package)
                    <div class="col-lg-4 col-md-6">
                        <div class="ps-item">
                            @if ($package->is_popular)
                                <div class="recommended-badge">MOST POPULAR</div>
                            @endif
                            <h3>{{ $package->duration }}</h3>
                            <div class="pi-price">
                                <h2>{{ $package->price }}</h2>
                                <span>JOD</span>
                            </div>
                            <ul>
                                <li>Full gym access</li>
                                <li>Premium equipment</li>
                                <li>Open gym hours</li>
                                <li>Sauna & steam room</li>
                                <li>Nutrition consultation</li>
                            </ul>

                            @if (Auth::user())
                                <form action="{{ route('stripe.checkout', $package) }}" method="POST"
                                    class="subscribe-form">
                                    @csrf

                                    <button type="submit" class="subscribe-btn">
                                        SUBSCRIBE
                                    </button>
                                    <div class="thumb-icon">
                                        <i class="fa {{ $package->icon }}"></i>
                                    </div>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="subscribe-btn">
                                    LOGIN TO SUBSCRIBE
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
