@extends('layouts.home-layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>HELP & CONTACT</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row align-items-center">
                <!-- Contact Info - Smaller Column -->
                <div class="col-lg-12 col-md-5">
                    <div class="section-title contact-title text-center">
                        <span>Contact us</span>
                        <h2>GET IN TOUCH!</h2>
                    </div>
                    <!-- Contact Form Section -->
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="contact-form">
                                <div class="section-title">
                                    <span style="color: black">Send us a message</span>
                                    <h2>CONTACT FORM</h2>
                                </div>

                                <form action="{{ route('contact.submit') }}" method="POST" class="mt-5">
                                    @csrf
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Your Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Your Email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="tel" class="form-control" name="phone"
                                                    placeholder="Mobile Phone" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject"
                                                    placeholder="Subject" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" placeholder="Your Message" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-primary">Send Message</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>


                </div>


            </div>

            <!-- Map - Wider Column -->
            <div class="col-lg-12 col-md-7 mt-5">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3387.2189999999997!2d35.7332721!3d32.0626087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151c97a313c6b645%3A0xa214f2991e3ccf20!2sDynamo%20Ladies%20Gym!5e0!3m2!1sen!2sjo!4v1620000000000!5m2!1sen!2sjo"
                        width="100%" height="400"
                        style="border:0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);" allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>


        </div>
    </section>
    <!-- Contact Section End -->

    <style>
        /* Custom styles */
        .map-container {
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-widget {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .cw-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .cw-icon {
            font-size: 20px;
            color: #ff6b6b;
            margin-right: 20px;
            margin-top: 5px;
        }

        .cw-text h5 {
            font-size: 18px;
            margin-bottom: 5px;
            color: #333;
        }

        .cw-text p {
            margin: 0;
            color: #666;
        }

        .contact-form {
            background: purple;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .form-control {
            height: 50px;
            border-radius: 4px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        textarea.form-control {
            height: auto;
        }

        .btn-primary {
            background-color: black;
            border-color: rgb(151, 31, 151);
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #862365;
            border-color: white;
        }

        @media (max-width: 768px) {
            .map-container {
                margin-top: 30px;
            }

            .contact-widget,
            .contact-form {
                padding: 20px;
            }
        }
    </style>
@endsection
