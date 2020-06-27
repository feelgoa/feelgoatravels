@extends('layouts.app')

@section('content')
<section>
	<div class="" style="padding: 0px 12px 0px 12px;">
	<div class="row" style="color: black;font-size: 20px;background-size: cover; background-image: url('../../assets/images/booking1.jpg'); padding: 12px;" >
	<div class="col-md-4" >
	</div>
	<div class="container">
	<div class="row">
	<div class="col-md-4" style="background-color: #0000008c; border-radius: 15px; padding:12px;">
		<h2 class="heading-text" style="color:white;">Booking status</h2>
		<form id="booking_status_form" name="booking_status_form" action="/recapcha-page" method="post" >
			@csrf
			<div class="form-group ">
				<label for="firstname" class="form-labels">PNR Number:</label>
				<span class="required-field">*</span>
				<input class="form-control" type="text" name="pnr" maxlength="8" id="pnr" placeholder="Enter PNR number" onblur="ValidateContact(this,'PNR is a 8 digit number and cannot be left empty.')" required>
			</div>
			<div class="form-group ">
				<label for="lastname" class="form-labels">Registered email:</label>
				<span class="required-field">*</span>
				<input class="form-control" type="email" name="email" id="email" placeholder="Enter email address" onblur="ValidateEmail(this,'Please your check email format')" required>
			</div>
			<span class="label label-danger" style="font-size: 14px;margin-bottom:14px;white-space: normal;" id="error_message"></span></br>
			<input type="reset" id="booking_status_reset" class="btn btn-info" value="RESET">
			<input type="button" id="booking_status_submit" class="btn btn-success" value="GET BOOKING STATUS">
			<br><br>
		</form>
		<form name="booking-s-fetch" id="booking-s-fetch" action="{{ SITE_URL.BOOKING_STATUS_URL }}" method="POST" > 
		{{ csrf_field() }}
		<input type="hidden" id="pnrvalueget" name="pnrvalueget">
		</form>
	</div>
</div>
</div>
	</div>
	</div>
</section>
@endsection