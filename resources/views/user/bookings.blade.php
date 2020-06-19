@extends('layouts.app')

@section('content')
<section class="booking_body">
<link rel="stylesheet" href="{{ URL::asset('assets/css/booking_style.css') }}">
<div class="container">
<div class="col-md-3">
</div>
<div class="fm-booking col-md-6" style="background-color: #0000008c;border-radius: 15px;padding: 12px;margin-top:12px;">
	<input id="one-s1" class="radio-s1" type="radio" name="stage" checked="checked" />
	<input id="two-s1" class="radio-s1" type="radio" name="stage" />
	<input id="three-s1" class="radio-s1" type="radio" name="stage" />
	<input id="four-s1" class="radio-s1" type="radio" name="stage" />
	<input id="five-s1" class="radio-s1" type="radio" name="stage" />
	<input id="six-s1" class="radio-s1" type="radio" name="stage" />

	<div class="stages-s1">
		<label for="one-s1" class="label-s1">1</label>
		<label for="two-s1" class="label-s1">2</label>
		<label for="three-s1" class="label-s1">3</label>
	</div>

	<span class="progress-s1"><span></span></span>

	<div class="panels-s1">
	<form id="formoid" class="frm-font" name="registration" id="eform" action="{{ route('bookings.insert') }}" method="POST">
	{{ csrf_field() }}
		<div data-panel="one-s1" class="div-s1">
			<h2 class="lable-from">Personal Details</h2>
			<div class="form-group ">
				<label class="frm-font lable-from" for="name1">Name:</label>
				<span class="required-field">*</span>
				<input type="text" class="frm-font form-control" id="name1" name="name1" placeholder="Enter Full Name" onblur="ValidateEmptyField(this,'Name cannot be empty')" required>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<label for="email" class="frm-font lable-from">Email:</label>
						<span class="required-field">*</span>
						<input type="email" class="frm-font form-control" name="email" id="email" placeholder="Enter email id" onblur="ValidateEmail(this,'Please your check email format')" required>
					</div>
					<div class="col-sm-6">
						<label for="tel" class="frm-font lable-from">Contact Number:</label>
						<span class="required-field">*</span>
						<input type="tel" size="10" class="frm-font form-control" id="contact" name="contact" placeholder="Contact number" onblur="ValidateContact(this,'Enter 10 digit mobile Number')" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6 team_details">
							<label for="gender" class="frm-font lable-from">Gender:</label><span class="required-field">*</span><br>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="gender" id="b1" value="male" required>
							  <label class="form-check-label lable-from" for="inlineRadio1">Male</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="gender" id="b2" value="female" required>
							  <label class="form-check-label lable-from" for="inlineRadio2">Female</label>
							</div>
					</div>
					<div class="col-sm-6 team_details">
							<label for="age" class="frm-font lable-from">Age:</label>
							<span class="required-field">*</span>
							<input type="number" class="frm-font form-control" min="1" max="80" id="age" name="age" placeholder="Enter Age" onblur="ValidateEmptyField(this,'Age cannot be empty')" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-4 team_details">
						<label for="place" class="frm-font lable-from">Place of Origin:</label>
						<span class="required-field">*</span>
						<input name="place" type="text" class="frm-font form-control" id="place" placeholder="Enter place of origin" onblur="ValidateEmptyField(this,'Place oF origin cannot be empty')" required>
					</div>
					<div class="col-sm-4 team_details">
						<label for="number" class="frm-font lable-from">Total Male Members:</label>
						<input name="male_count" type="number" min="0" max="50" value="0" class="frm-font form-control" id="male_count" placeholder="Male Members count" required>
					</div>
					<div class="col-sm-4 team_details">
						<label for="number" class="frm-font lable-from">Total Female Members:</label>
						<input name="female_count" type="number" min="0" max="50" value="0" class="frm-font form-control" id="female_count" placeholder="Female Members count" required>
					</div>
				
				</div>
			</div>
			<span class="label label-danger" style="font-size: 100%;background-color: #f90700;" id="error_message"></span>
		</div>
		<div data-panel="two-s1" class="div-s1">
			<h2 class="lable-from">Package Details</h2>
				<div class="checkbox" style="padding-left: 3.5rem;margin-top: 15px;">
					<label for="customCheckBox5" class="lable-from">
						<input type="checkbox" id="customCheckBox5" onclick="eventCheckBox()">
						Select All
						</label>
				</div><br>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<h6 class="lable-from">Exclusive North Goa Tour</h6>
						<div class="form-group">
						@foreach ($package_details as $spot)
							@if($spot->zone=="North Goa")
							<div class="checkbox" style="padding-left: 3.5rem;margin-top: 15px;">
								<label class="lable-from">
								<input type="checkbox" class="tours" id="{{$spot->id}}" name="spots[]" value="{{$spot->id}}">
								{{$spot->spot_name}}
								</label>
							</div>
							@endif
						@endforeach
						</div>
					</div>
					<div class="col-sm-6">
						<h6 class="lable-from">Exclusive South Goa Tour</h6>
						<div class="form-group">
							@foreach ($package_details as $spot)
							@if($spot->zone=="South Goa")
							<div class="checkbox" style="padding-left: 3.5rem;margin-top: 15px;">
								<label class="lable-from">
								<input type="checkbox" class="tours" id="{{$spot->id}}" name="spots[]" value="{{$spot->id}}">
								{{$spot->spot_name}}
								</label>
							</div>
							@endif
						@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="alert alert-warning" role="alert">
			  <strong>Note:</strong> For more info on places you can click <a style="color:#CE3232;" href="/locations" target="_blank">here</a>.
			</div>
		</div>
		<div data-panel="three-s1" class="div-s1">
			<h2 class="lable-from">PickUp Details </h2>
			<!-- Date Picker Input -->
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<label for="travel_date" class="frm-font lable-from">Travelling Date:</label>
						<span class="required-field">*</span>
						<input type="date" class="frm-font form-control" name="travel_date" id="travel_date" onblur="CheckDate(this,'Travelling Date should be in Future')" required>
					</div>
					 <div class="col-sm-6">
						<label for="" class="frm-font lable-from">Pickup Point:</label>
						<span class="required-field">*</span>
						<select id="pickup_point" name="pickup_point" class="form-control">
							<option selected>Select</option>
							<option value="Colva">Colva</option>
							<option value="Margao">Margao</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group" style="display:none">
				<div class="checkbox">
					<label for="hotelbooking lable-from">
					<input type="checkbox" id="hotelbooking" name="hotelbooking" value="yes">
					Book Hotel</label>
				</div>
			</div>
			<span class="label label-danger" id="error_message1"></span><br>
			<input type = 'submit' class="btn btn-success" value = "Submit Details"/>
		</div>
		
	</form>
	</div>
	<br>
	<button class="button-s1-next btn btn-success">Next</button>
</div>
</div>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/booking_script.js') }}"></script>
</section>
@endsection