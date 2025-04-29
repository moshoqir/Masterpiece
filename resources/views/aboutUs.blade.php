@extends('layouts.home-layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg"></section>
    <!-- Breadcrumb Section End -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- About US Section Begin -->
    <section class="aboutus-section mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="about-video set-bg" data-setbg="img/about-us.jpg">
                    </div>
                </div>
                <div class="col-lg-6 p-0 ">
                    <div class="about-text">
                        <div class="section-title">
                            <span>ABOUT US</span>
                            <h2>What we do</h2>
                        </div>
                        <div class="at-desc">
                            <p>Strength is a whisper in the bones, a melody of motion. The mirror does not judge; it only
                                listens.
                                Here, where the air hums with quiet defiance, muscles remember what the world forgets.
                                Enter not to change, but to reveal. Sweat is the ink, and you are the story.</p>
                        </div>
                        <div class="about-bar">
                            <div class="ab-item">
                                <p>Body building</p>
                                <div id="bar1" class="barfiller">
                                    <span class="fill" data-percentage="80"></span>
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ab-item">
                                <p>Entrainement</p>
                                <div id="bar2" class="barfiller">
                                    <span class="fill" data-percentage="85"></span>
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ab-item">
                                <p>Fitness</p>
                                <div id="bar3" class="barfiller">
                                    <span class="fill" data-percentage="75"></span>
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About US Section End -->


    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="img/banner-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="bs-text animate__animated animate__fadeInDown">
                        <h2 class="text-uppercase mb-3"
                            style="font-size: 3.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">YOUR FIRST SESSION IS FREE!
                        </h2>
                        <div class="bt-tips mb-4" style="font-size: 1.5rem;">
                            The <strong class="highlight-text">DYNAMO GYM</strong> team welcomes you!
                        </div>

                        <!-- Animated CTA Button -->
                        <a href="/contact" class="primary-btn btn-hover" style="padding: 15px 40px; font-size: 1.2rem;">
                            <span class="btn-text">Réserver Maintenant</span>
                            <span class="btn-icon"><i class="fa fa-arrow-right"></i></span>
                        </a>

                        <!-- Countdown Timer (Optional) -->
                        <div class="offer-countdown mt-4" style="color: #fff; font-size: 1.2rem;">
                            <span id="countdown" style="font-weight: 700;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Your opinions matter</span>
                        <h2>Welcome</h2>
                    </div>
                </div>
            </div>
            <div class="ts_slider owl-carousel">
                <div class="ts_item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="ti_pic">
                                <img src="img/testimonial/testimonial-1.jpg" alt="">
                            </div>
                            <div class="ti_text">
                                <p>Salle de sport très bien agencée.
                                    Personnel très sympathique.
                                    Manque peut-être une deuxième machine pour les squats car très souvent occupée et une
                                    machine pour les mollets mais très bien dans l&apos;ensemble.
                                    Le samedi la salle ferme un peu tôt.
                                    A part ça je ne vois pas de point négatif.
                                    Vive le sport, que du bonheur.<br /> Vive le sport, que du bonheur.</p>
                                <h5>Lee Stokes</h5>
                                <div class="tt-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ts_item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="ti_pic">
                                <img src="img/testimonial/testimonial-2.jpg" alt="">
                            </div>
                            <div class="ti_text">
                                <p>Équipe très sympa et toujours disponible. Salle toujours très propre même si certains
                                    adhérents ne désinfectent pas toujours les machines derrière eux (et oublient de porter
                                    le masque). Présence du personnel sur de grandes amplitudes horaires (cela est
                                    rassurant).</p>
                                <h5>Wayne Aufderhar</h5>
                                <div class="tt-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->
@endsection
