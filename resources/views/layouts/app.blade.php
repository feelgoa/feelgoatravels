<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

		<title>FeelGoa - Tours and Travels</title>
		<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}" />
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
		<link rel="stylesheet" href="{{ URL::asset('assets/css/styles.scss') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/swiper.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.min.css') }}">

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
						<li><a href="/" class="smoothScroll">Home</a></li>
						<li><a href="#" class="smoothScroll">About</a></li>
						<li><a href="#" class="smoothScroll">Packages</a></li>
						<li><a href="#" class="smoothScroll">Locations</a></li>
						<li><a href="#" class="smoothScroll">Contact Us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="tel:+91 88881 65163">Call Now! <i class="fa fa-phone"></i>+91 88881 65163</a></li>
					</ul>
				</div>
			</div>
		</section>
		@yield('content')
		<!-- FOOTER -->
		<footer id="footer" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">

					<div class="col-md-4 col-sm-4">
							<div class="footer-info">
								<div class="section-title">
									<h2 class="wow fadeInUp" data-wow-delay="0.2s">Find us <a onMouseOver="this.style.color='#23527c'" onMouseOut="this.style.color='#909090'"id="fbicon" class="fa fa-facebook-square" attr="facebook icon" style="font-size: 40px;cursor:pointer;"></a>
									</h2>
								</div>
								<address class="wow fadeInUp" data-wow-delay="0.4s">
									<p>Office: Konkan Railway Station,<br>Margao, Salcete Goa.<br>

									<a href="tel:+91 83227 80521">&nbsp;<i class="fa fa-phone"></i>+91 83227 80521</a>
									<a href="tel:+91 98225 81353">&nbsp;<i class="fa fa-phone"></i>+91 98225 81353</a><br>
									<a href="tel:+91 98603 30901">&nbsp;<i class="fa fa-phone"></i>+91 98603 30901</a>
									<a href="tel:+91 95036 76268">&nbsp;<i class="fa fa-phone"></i>+91 95036 76268</a><br>
									<a href="tel:+91 88881 65163">&nbsp;<i class="fa fa-phone"></i>+91 88881 65163</a>
									</p>
									<p>Also at: Colva, Salcete Goa<br><i>(Please contact above mobile numbers for further details)</i></p>
								</address>
							</div>
					</div>

					<div class="col-md-4 col-sm-4">
							<div class="footer-info">
								<div class="section-title">
									<h2 class="wow fadeInUp" data-wow-delay="0.2s">Useful Links</h2>
								</div>
								<address class="wow fadeInUp" data-wow-delay="0.4s">
									<p><a href=""><i class="fa fa-ticket"></i> Get ticket Ecopy</a></p>
								</address>
							</div>
					</div>

					<div class="col-md-4 col-sm-4">
					<div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
		<div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
        var setting = {"height":500,"width":500,"zoom":16,"queryString":"The Chocolate Room, KTC Margao, opposite KTC, Madel, Margao, Goa, India","place_id":"ChIJI5A7fCyyvzsRjrrtzPghOHo","satellite":false,"centerCoord":[15.287444904340608,73.95506615],"cid":"0x7a3821f8ccedba8e","lang":"en","cityUrl":"/india/calangute-32448","cityAnchorText":"Map of Calangute, South Kerala, India","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"177407"};
        var d = document;
        var s = d.createElement('script');
        s.src = 'https://embedgooglemap.1map.com/js/script-for-user.js?embed_id=177407';
        s.async = true;
        s.onload = function (e) {
          window.OneMap.initMap(setting)
        };
        var to = d.getElementsByTagName('script')[0];
        to.parentNode.insertBefore(s, to);
	  })();</script>		<a href="https://embedgooglemap.1map.com?embed_id=177407">1 Map</a>
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
								<p align="center"><br>&copy; 2020 - Feel Goa | Approved by Government of Goa and Recognised by department of Tourism, Goa</p>
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
