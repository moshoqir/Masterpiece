@extends('layouts.home-layout')
@section('content')
    <!-- Hero Section Begin -->

    <section class="hero-section">

        <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-modified.png') }}">


        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpeg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Get the Body of Your Dreams</span>
                                <h1>Be <strong> Dynamo </strong> With Us</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2-1.jpeg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">

                                <h1> <strong>Fitness</strong> IS ESSENTIAL !</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- ChoseUs Section Begin -->
    <section class="choseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>WHY DYNAMO?</span>
                        <h2>PUSH YOUR LIMITS</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-034-stationary-bike"></span>
                        <h4>Modern equipment</h4>
                        <p>We have the most modern equipment available on the market to provide you with a high-quality
                            training experience.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-033-juice"></span>
                        <h4>Premium Gym Products</h4>
                        <p>At our gym, we don’t just focus on workouts—we also provide top-quality products to support your
                            fitness journey!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-002-dumbell"></span>
                        <h4>Professional training plan</h4>
                        <p>Our highly qualified instructors develop customized training plans to meet your specific goals
                            and needs.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-014-heart-beat"></span>
                        <h4>Unique to your needs</h4>
                        <p>We understand that each person is unique, which is why we tailor our training programs to your
                            individual preferences and goals.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- Classes Section Begin -->
    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>PUSH YOUR LIMITS</span>
                        <h2>EQUIPEMENT & STUDIO</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/accueil/cardio.jpeg" usemap="#cardios" alt="Space CARDIO">
                            <map name="cardios">
                                <area shape="rect" coords="4,7,609,439" alt="Space CARDIO">
                            </map>
                        </div>
                        <div class="ci-text">
                            <span>Space</span>
                            <h5>Cardio</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/accueil/renfo.jpeg" usemap="#renfos" alt="">
                            <map name="renfos">
                                <area shape="rect" coords="4,7,609,439" alt="">
                            </map>
                        </div>
                        <div class="ci-text">
                            <span>Space</span>
                            <h5>Renforcement</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/accueil/strech.jpeg" usemap="#stretchs" alt="">
                            <map name="stretchs">
                                <area shape="rect" coords="4,7,609,439" alt="">
                            </map>
                        </div>
                        <div class="ci-text">
                            <span>Space</span>
                            <h5>Stretching</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/accueil/spa2.png" usemap="#studios"alt="">
                            <map name="studios">
                                <area shape="rect" coords="4,7,609,439" alt="">
                            </map>
                        </div>
                        <div class="ci-text">
                            <span>Studio</span>
                            <h4>Spa</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/accueil/caf2.jpeg" usemap="#salles" alt="">
                            <map name="salles">
                                <area shape="rect" coords="4,7,609,439" alt="">
                            </map>
                        </div>
                        <div class="ci-text">
                            <span>Studio</span>
                            <h4>Cafeteria</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->


    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>OUR SPECIAL PLANS</span>
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
            <div class="row">
                <div class="col-lg-12 text-center mt-4">
                    <a href="/pricinguser" class="primary-btn">View All Packages</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section End -->


    <!-- Products Section Begin -->
    <section class="products-section spad">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>PREMIUM QUALITY</span>
                        <h2>OUR PRODUCTS</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @php
                    $products = \App\Models\Product::where('is_featured', 1)->take(4)->get();
                @endphp
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6">
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
                                <h6>{{ number_format($product->price, 2) }}JOD </h6>
                                <p>{{ $product->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center mt-4">
                    <a href="/productsuser" class="primary-btn">View All Products</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Products Section End -->
@endsection
