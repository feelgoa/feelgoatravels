@extends('layouts.app')

@section('content')
<section>
	<div class="">
	<div class="row" style="color: black;font-size: 20px;background-size: cover; background-image: url('http://127.0.0.1/assets/images/contact-us-1.jpg'); padding: 12px;" >
	<div class="col-md-4" >
	</div>
	<div class="container">
	<div class="row">
	<div class="col-md-4" style="background-color: #ccc9c8;box-shadow: 12px 12px #00000045;">
		<h2 class="heading-text">Contact Us</h2>
		<form id="contactus_form" name="contactus_form" action="/recapcha-page" method="post" >
			@csrf
			<div class="form-group ">
				<label for="firstname" class="form-labels">First Name:</label>
				<span class="required-field">*</span>
				<input class="form-control" type="text" name="firstname" id="firstname" placeholder="Enter First Name" required>
			</div>
			<div class="form-group ">
				<label for="lastname" class="form-labels">Last Name:</label>
				<span class="required-field">*</span>
				<input class="form-control" type="text" name="lastname" id="lastname" placeholder="Enter last Name" required>
			</div>
			<div class="form-group ">
				<label for="email" class="form-labels">Email:</label>
				<span class="required-field">*</span>
				<input class="form-control" type="email" name="email" id="email" placeholder="Type your email" required>
			</div>
			<div class="form-group ">
				<label for="phone" class="form-labels">Phone:</label>
				<input class="form-control" type="text" name="phone" id="phone" placeholder="Type your Phone no">
			</div>
			<div class="form-group">
				<label  for="comment" class="form-labels">Message:</label>
				<span class="required-field">*</span>
				<textarea class="form-control" name="message" rows="5" id="message" style="width:100%;resize: none;" required></textarea>
			</div>
			<div class="form-group">
				<div class="g-recaptcha" data-sitekey="{{ RECAPCHA_SITE_KEY }}"></div>
			</div>
			<input type="reset" id="contact_us_reset" class="btn btn-info" value="RESET">
			<input type="button" id="contact_us_submit" class="btn btn-success" value="SUBMIT">
			<br><br>
		</form>
	</div>
</div>
</div>
	</div>
	</div>
</section>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
@endsection