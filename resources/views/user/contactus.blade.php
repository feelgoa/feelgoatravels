@extends('layouts.app')

@section('content')
<section>
    <div class="container">
	<div class="row" style="color: black;font-size: 20px;">
		<h2>Write To US</h2>
		<form id="contactus_form" name="contactus_form" action="/recapcha-page" method="post" >
			@csrf
			<div class="form-group ">
				<label for="firstname">First Name:</label>
				<input class="form-control" type="text" name="firstname" id="firstname" placeholder="Enter First Name" required>
			</div>
			<div class="form-group ">
				<label for="lastname">Last Name:</label>
				<input class="form-control" type="text" name="lastname" id="lastname" placeholder="Enter last Name" required>
			</div>
			<div class="form-group ">
				<label for="email">Email:</label>
				<input class="form-control" type="email" name="email" id="email" placeholder="Type your email" onblur="ValidateEmail()" required>
			</div>
			<div class="form-group ">
				<label for="phone">Phone:</label>
				<input class="form-control" type="text" name="phone" id="phone" placeholder="Type your Phone no">
			</div>
			<div class="form-group">
				<label  for="comment">MESSAGE:</label>
				<textarea class="form-control" name="comment" rows="5" id="comment" required></textarea>
			</div>
			<div class="form-group">
				<div class="g-recaptcha" data-sitekey="{{ RECAPCHA_SITE_KEY }}"></div>
			</div>
			<input type="reset" id="contact_us_submit" class="btn btn-warning btn-lg"  name="submit" value="Reset">
			<input type="button" id="contact_us_submit" class="btn btn-info btn-lg"  name="submit" value="SUBMIT"><br><br>
		</form>
	</div>
	</div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="validator.js"></script>
    <script src="contact.js"></script>
@endsection