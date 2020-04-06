<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <title>FeelGoa - Tours and Travels</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!--CSS INCLUDES -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/templatemo-style.css') }}">

    </head>
    <body>
        <!-- PRE PAGE LOADER -->
        <section class="preloader">
            <div class="spinner">
                <span class="spinner-rotate"></span>
            </div>
        </section>

        <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>
                    <!-- lOGO TEXT HERE -->
                    <a href="/" class="navbar-brand">feel<span> </span>Goa</a>
                </div>
                <!-- MENU LINKS -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                        <li><a href="#home" class="smoothScroll">Home</a></li>
                        <li><a href="#about" class="smoothScroll">About</a></li>
                        <li><a href="#team" class="smoothScroll">Chef</a></li>
                        <li><a href="#menu" class="smoothScroll">Menu</a></li>
                        <li><a href="#contact" class="smoothScroll">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="tel:+91 88881 65163">Call Now! <i class="fa fa-phone"></i>+91 88881 65163</a></li>
                        <a href="#footer" class="section-btn">Contact Us</a>
                    </ul>
                </div>
            </div>
        </section>
        @yield('content')
        <!-- FOOTER -->
        <footer id="footer" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 col-sm-8">
                            <div class="footer-info">
                                <div class="section-title">
                                    <h2 class="wow fadeInUp" data-wow-delay="0.2s">Find us</h2>
                                </div>
                                <address class="wow fadeInUp" data-wow-delay="0.4s">
                                    <p>123 nulla a cursus rhoncus,<br> augue sem viverra 10870<br>id ultricies sapien</p>
                                </address>
                            </div>
                    </div>

                    <div class="col-md-3 col-sm-8">
                            <div class="footer-info">
                                <div class="section-title">
                                    <h2 class="wow fadeInUp" data-wow-delay="0.2s">Reservation</h2>
                                </div>
                                <address class="wow fadeInUp" data-wow-delay="0.4s">
                                    <p><a href="tel:+91 88881 65163">Call Now! <i class="fa fa-phone"></i>+91 88881 65163</a></p>
                                </address>
                            </div>
                    </div>

                    <div class="col-md-4 col-sm-8">
                            <div class="footer-info footer-open-hour">
                                <div class="section-title">
                                    <h2 class="wow fadeInUp" data-wow-delay="0.2s">Open Hours</h2>
                                </div>
                                <div class="wow fadeInUp" data-wow-delay="0.4s">
                                    <p>Monday: Closed</p>
                                    <div>
                                        <strong>Tuesday to Friday</strong>
                                        <p>7:00 AM - 9:00 PM</p>
                                    </div>
                                    <div>
                                        <strong>Saturday - Sunday</strong>
                                        <p>11:00 AM - 10:00 PM</p>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-2 col-sm-4">
                            <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                                <li><a class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                <li><a class="fa fa-twitter"></a></li>
                                <li><a class="fa fa-instagram"></a></li>
                                <li><a class="fa fa-google"></a></li>
                            </ul>

                            <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s"> 
                                <p><br>Copyright &copy; 2020 <br>Feel Goa
                            </div>
                    </div>
                    
                </div>
            </div>
            <!-- SCRIPTS -->
            <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.stellar.min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('assets/js/wow.min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('assets/js/owl.carousel.min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('assets/js/smoothscroll.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('assets/js/custom.js') }}"></script>
        </footer>
    </body>
</html>
