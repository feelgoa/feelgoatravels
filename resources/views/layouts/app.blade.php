<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

		<title>{{ SITE_SHORT_DESC }} | {{ $title }}</title>
		<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}" />
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!--CSS INCLUDES -->
		<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/templatemo-style.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/styles.scss') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/swiper.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.min.css') }}">

	</head>
	<body>
		<div id="overlay"></div>
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
					<a href="{{ SITE_URL.HOME_URL }}" class="navbar-brand" style="font-size: 40px;"> {{ SITE_NAME }}</a>
				</div>
				<!-- MENU LINKS -->
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-nav-first">
						<li style= "display:none;" id="home"><a href="{{ SITE_URL.HOME_URL }}" class="smoothScroll">Home</a></li>
						<li id="packages" style="display:none;"><a href="{{ SITE_URL.PACKAGES_URL }}" class="smoothScroll">Packages</a></li>
						<li id="locations"><a href="{{ SITE_URL.LOCATION_URL }}" class="smoothScroll">Locations</a></li>
						<li id="bookings"><a href="{{ SITE_URL.BOOKING_URL }}" class="smoothScroll">Bookings</a></li>
						<li id="gallery"><a href="{{ SITE_URL.GALLERY_URL }}" class="smoothScroll">Gallery</a></li>
						<li id="contact-us"><a href="{{ SITE_URL.CONTACTUS_URL }}" class="smoothScroll">Contact Us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right phone-no-div">
						<li>
							<a href="tel:+91 88881 65163" class="" style="color: #ce3232;">
								<div style="display: flex;">
									<div>
										<i class="fa fa-phone cu" style="font-size: 25px;"></i>
									</div>
									<div>
										<span class="cu" style="padding-left: 10px;"> CALL US</span>
									</div>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-12" id='marquee-holder'>
				<marquee class="infoalert" onmouseover="this.stop();" onmouseout="this.start();">
					We will be fully functional by October 2020 according the info recieved by Goa Government. If there is any delay we will keep you updated. Thank you.
				</marquee>
			</div>
		</section>
		@yield('content')
		<!-- FOOTER -->
		<footer id="footer" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6">
							<div class="footer-info">
								<div class="section-title">
									<h2 class="wow fadeInUp" data-wow-delay="0.2s">Find us <a onMouseOver="this.style.color='#23527c'" onMouseOut="this.style.color='#909090'"id="fbicon" class="fa fa-facebook-square" attr="facebook icon" style="font-size: 20px;cursor:pointer;"></a>
									</h2>
								</div>
								<address class="wow fadeInUp" data-wow-delay="0.4s">
									<div id="addr_location">
									</div>
								</address>
							</div>
					</div>

					<div class="col-md-4 col-sm-6">
							<div class="footer-info">
								<div class="section-title">
									<h2 class="wow fadeInUp" data-wow-delay="0.2s">Useful Links</h2>
								</div>
								<address class="wow fadeInUp" data-wow-delay="0.4s">
									<p style="display:none;"><a href=""><i class="fa fa-ticket"></i> Get ticket Ecopy</a></p>
									<p><a href="{{ SITE_URL.BOOKING_STATUS_URL }}"><i class="fa fa-ticket"></i> Booking status enquiry</a></p>
								</address>
							</div>
					</div>

					<div class="col-md-4 col-sm-6" style="display:none;">
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

					<div class="col-md-4 col-sm-8" style="display:none;">
							<ul class="wow fadeInUp" data-wow-delay="0.4s" style="list-style-type:none;">
								<li><a class="fa fa-facebook-square" attr="facebook icon" style="font-size: 100px;cursor:pointer;display:inline-block;margin:0 auto;"></a></li>
								<!--<li><a class="fa fa-twitter"></a></li>
								<li><a class="fa fa-instagram"></a></li>
								<li><a class="fa fa-google"></a></li>-->
							</ul>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12 col-sm-12">
							<div class="wow fadeInUp copyright-text" data-wow-delay="0.8s"> 
                                <hr>
								<p align="center"><br>&copy; 2020 - Feel Goa | Approved by Government of Goa and Recognised by Department of Tourism, Goa</p>
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
			<script type="text/javascript" src="{{ URL::asset('assets/js/swiper.min.js') }}"></script>
			</footer>
	</body>
</html>
