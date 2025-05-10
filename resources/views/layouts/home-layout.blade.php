<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dynamo Ladies Gym</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="apple-touch-icon">


    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-modified.png') }}">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/barfiller.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slickbar.css') }}" type="text/css">
</head>

<body>


    @include('layouts.chatbot')
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="/">
                            <img class="logoMain" src="img/logo-modified.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/about-us">About us</a></li>
                            <li><a href="/services">SERVICES</a></li>
                            <li><a href="/productsuser">Products</a></li>
                            <li><a href="/pricinguser">Packages</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-social">
                            <a target="_blank" href="https://www.facebook.com/DynamoLadiesGym/"><i
                                    class="fa-brands fa-facebook-f" style="color: #f1f2f3;"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter" style="color: #ebedef;"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube" style="color: #ffffff;"></i></a>
                            <a target="_blank"
                                href="https://www.instagram.com/dynamo1gym/?igsh=MTFzcjJlbTJ3eHU3aA%3D%3D"><i
                                    class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>

                            @auth
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user-circle"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <a href="{{ route('cart.show') }}">
                                    <i style="color: white" class="fa fa-shopping-cart"></i>
                                    <span
                                        class="cart-counter">{{ App\Models\Cart::where('session_id', Session::getId())->sum('quantity') }}</span>
                                </a>
                            @else
                                <a href="/dashboard" class="favorite styled">Join us</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Offcanvas Menu Section -->
            <div class="offcanvas-menu-overlay"></div>
            <div class="offcanvas-menu-wrapper">
                <div class="canvas-close">
                    <i class="fa fa-close"></i>
                </div>
                <nav class="mobile-menu">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about-us">About us</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/productsuser">Products</a></li>
                        <li><a href="/contact">Contact</a></li>
                        @auth
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">
                                    Logout
                                </a>
                                <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            {{-- <li><a href="{{ route('cart.show') }}">Cart ({{ Cart::count() }})</a></li> --}}
                        @else
                            <li><a href="/dashboard">Join Us</a></li>
                        @endauth
                    </ul>
                </nav>
                <div class="canvas-social">
                    <a target="_blank" href="https://www.facebook.com/DynamoLadiesGym/"><i
                            class="fa-brands fa-facebook-f" style="color: #f1f2f3;"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter" style="color: #ebedef;"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube" style="color: #ffffff;"></i></a>
                    <a target="_blank" href="https://www.instagram.com/dynamo1gym/?igsh=MTFzcjJlbTJ3eHU3aA%3D%3D"><i
                            class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->



    @yield('content')




    <!-- Get In Touch Section Begin -->
    <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="gt-text">
                        <a target="_blank"
                            href="https://www.google.com/maps/dir//%D8%A8%D8%A7%D9%84%D9%82%D8%B1%D8%A8+%D9%85%D9%86+%D8%A7%D9%84%D8%AF%D9%81%D8%A7%D8%B9+%D8%A7%D9%84%D9%85%D8%AF%D9%86%D9%8A+%D8%A7%D9%84%D8%B3%D9%84%D8%B7,+As-Salt+11910%E2%80%AD/@32.062582,35.6508708,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x151c97a313c6b645:0xa214f2991e3ccf20!2m2!1d35.7332721!2d32.0626087?entry=ttu&g_ep=EgoyMDI1MDMzMC4wIKXMDSoASAFQAw%3D%3D">
                            <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                        </a>
                        <p>As, Salt <br /> Jordan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text">
                        <a href="tel:+962775489946">
                            <i class="fa fa-mobile"></i>
                        </a>

                        <ul>
                            <li>(962) 7 7548 9946</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text email">
                        <a href="mailto:Dynamo1Gym@gmail.com">
                            <i class="fa fa-envelope"></i>
                        </a>

                        <p>Dynamo1Gym@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Get In Touch Section End -->

    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#"><img src="img/logomain.jpg" alt=""></a>
                        </div>
                        <p>Whether you're a beginner or an expert, a fan of gym sessions or yoga at home, it doesn't
                            matter. Whoever you are and whatever your workout style, you're welcome at Dynamo Gym.
                            DYNAMO GYM loves
                            you! GO FOR IT!</p>
                        <div class="fa-social">
                            <a target="_blank" href="https://www.facebook.com/DynamoLadiesGym/"><i
                                    class="fa-brands fa-facebook-f" style="color: #f1f2f3;"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter" style="color: #ebedef;"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube" style="color: #ffffff;"></i></i></a>
                            <a target="_blank"
                                href="https://www.instagram.com/dynamo1gym/?igsh=MTFzcjJlbTJ3eHU3aA%3D%3D"><i
                                    class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>
                            <a href="#"><i class="fa  fa-envelope-os"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Help & Information</h4>
                        <ul>
                            <li><a href="/about-us">WHY DYNAMO GYM</a></li>

                            <li><a href="/contact">CONTACT</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fs-widget">
                        <h4>Tips and Guides</h4>
                        <div class="fw-recent">
                            <h6><a href={{ 'article1' }}>Physical fitness can help prevent depression, anxiety</a>
                            </h6>
                            <ul>
                                <li>3 min </li>

                            </ul>
                        </div>
                        <div class="fw-recent">
                            <h6><a href={{ 'article2' }}>Fitness: The best exercise to lose belly fat and tone
                                    up...</a></h6>
                            <ul>
                                <li>3 min </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p> Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> DYNAMO GYM - All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>
