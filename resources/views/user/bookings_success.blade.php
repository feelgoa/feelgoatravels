@extends('layouts.app')

@section('content')

<section style="background: url(assets/images/booking1.jpg);background-size: cover;">
<link rel="stylesheet" href="{{ URL::asset('assets/css/booking_style.css') }}">
<div class="container">
<div class="col-md-3">
</div>
<div class="text-center col-md-6" style='background-color: #0000008c;border-radius: 15px;padding: 12px;margin-top: 12px;'>
	<h1><span style='color: #1ab91f;font-size:100px;margin-top: 50px;'>&#10004;</span></h1>
	<p class="pfont">Your booking request has been successfully registered. You will receive a response from the Feel Goa team with details on availablity and the payments.</p>
	<p>
	</p>
  <p class="pfont">Here is your booking PNR number : <b>{{$booking_pnr}} .</b> You will also recieve an email with these details.</p>
  <p class="pfont">You can use this PNR number to track the status of your request by clicking on <b>"Booking status enquiry"</b> at the bottom of the page.</p>
</div>
</div>
</section>
@endsection