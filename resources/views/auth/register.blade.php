<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/slickbar.css" type="text/css">

</head>
<style>
    .logo {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 1000;
    }

    .logoMain {
        height: 70px;
        /* Adjust as needed */
        width: auto;
    }
</style>

<body>

    <div class="limiter">
        <div class="container-log" style="background-image: url('img/hero/hero-1.jpeg');">
            <div class="logintn">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="logo">
                        <a href="/">
                            <img class="logoMain" src="img/logo-modified.png" alt="">
                        </a>
                    </div>



                    <div class="wrap-input100 validate-input" data-validate = "Name">
                        <input class="input100" type="text" name="name" placeholder="Name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <p style="color: red;margin-bottom:1vh">{{ $message }}</p>
                            </span>
                        @enderror





                    </div>


                    <div class="wrap-input100 validate-input" data-validate = "Email Address">
                        <input class="input100" type="email" name="email" placeholder="Email Address"
                            value="{{ old('email') }}" autocomplete="off">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <p style="color: red;margin-bottom:1vh">{{ $message }}</p>
                            </span>
                        @enderror





                    </div>




                    <div class="wrap-input100 validate-input" data-validate="Password">
                        <input class="input100" type="password" name="password" placeholder="Password" required
                            autocomplete="new-password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <p style="color: red;margin-bottom:1vh">{{ $message }}</p>
                            </span>
                        @enderror
                    </div>




                    <div class="wrap-input100 validate-input" data-validate="Confirm Password">
                        <input class="input100" type="password" name="password_confirmation"
                            placeholder="Confirm Password" required autocomplete="new-password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>

                    </div>







                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            REGISER
                        </button>
                    </div>



                    <div class="text-center mt-3" style="margin-top: 2vh">
                        <a href="/login" class="text-decoration-none">
                            Already have account? Login
                        </a>
                    </div>



                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>


    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="vendor/animsition/js/animsition.min.js"></script>

    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>

    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>

    <script src="vendor/countdowntime/countdowntime.js"></script>

    <script src="js/main.js"></script>

</body>

</html>
