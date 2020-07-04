@extends('layouts.app')

@section('content')
<section class="booking_cover_body" style="background-size: cover; background-blend-mode: multiply;background-image: linear-gradient(to right,#fbfbfb 0%,#f4433673 100%),url('../../assets/images/booking_cover.jpg');">
<link rel="stylesheet" href="{{ URL::asset('assets/css/booking_style.css') }}">
<div class="container">
<div class="row">
    <div class="col col-md-2"></div>
	<div class="col col-md-5">
        <div class="booking-card">
        <a href="{{ SITE_URL.BOOKING_URL }}"><img src="{{ URL::asset('assets/images/tour.jpg') }}" class="booking-card-media" /></a>
        <center>
        <div class="booking-card-details">
            <a href="{{ SITE_URL.BOOKING_URL }}" class="booking-card-head btn btn-primary btn-lg active">Tour Booking</a>
        </div>
        </center>
	</div>
	
	</div>
	<div class="col col-md-5">
	<div class="booking-card">
	  <a href="test.html"><img src="{{ URL::asset('assets/images/carrental.jpg') }}" class="booking-card-media" /></a>
	  <center>
	  <div class="booking-card-details">
		<a href="test.html" class="booking-card-head btn btn-primary btn-lg active">Car Rentals</a>
	  </div>
	  </center>
	</div>
	</div>
</div>
<div class="row">
    <div class="col col-md-2"></div>
	<div class="col col-sm-5">
	<div class="booking-card">
	  <a href="test.html"><img src="{{ URL::asset('assets/images/rooms.jpg') }}" class="booking-card-media" /></a>
	  <center>
	  <div class="booking-card-details">
		<a href="test.html" class="booking-card-head btn btn-primary btn-lg active">Hotel Booking</a>
	  </div>
	  </center>
	</div>
	</div>
	<div class="col col-sm-5">
	<div class="booking-card">
	  <a href="test.html"><img src="{{ URL::asset('assets/images/weddingcar.jpg') }}" class="booking-card-media" /></a>
	  <center>
	  <div class="booking-card-details">
		<a href="test.html" class="booking-card-head btn btn-primary btn-lg active">Wedding Car</a>
	  </div>
	  </center>
	</div>
	</div>
</div>
</div>
</section>