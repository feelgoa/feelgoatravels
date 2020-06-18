@extends('layouts.app')

@section('content')
<section class="booking_body">
<link rel="stylesheet" href="{{ URL::asset('assets/css/booking_style.css') }}">
<div class="container">
<div class="form-s1">
	<h2>Feel Goa</h2>

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
			<h2>Personal Details</h2>
			<div class="form-group ">
                <label class="frm-font " for="name1">Name:</label>
                <input type="text" class="frm-font  form-control" id="name1" name="name1" placeholder="Enter Full Name" onblur="ValidateEmptyField(this,'Name cannot be empty')" required>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="email" class="frm-font">Email:</label>
                        <input type="email" class="frm-font form-control" name="email" id="email" placeholder="Enter email id" onblur="ValidateEmail(this,'Please your check email format')" required>
                    </div>
					<div class="col-sm-6">
                        <label for="tel" class="frm-font">Contact Number:</label>
                        <input type="tel" size="10" class="frm-font form-control" id="contact" name="contact" placeholder="Contact number" onblur="ValidateContact(this,'Enter 10 digit mobile Number')" required>
                    </div>
                </div>
            </div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6 team_details">
							<label for="gender" class="frm-font">Gender:</label><br>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="gender" id="b1" value="male" required>
							  <label class="form-check-label" for="inlineRadio1">Male</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="gender" id="b2" value="female" required>
							  <label class="form-check-label" for="inlineRadio2">Female</label>
							</div>
					</div>
					<div class="col-sm-6 team_details">
							<label for="age" class="frm-font">Age:</label>
                            <input type="number" class="frm-font form-control" min="1" max="12" id="age" name="age" placeholder="Enter Age" onblur="ValidateEmptyField(this,'Age cannot be empty')" required>
					</div>
				</div>
			</div>
            <div class="form-group">
                <div class="row">
					<div class="col-sm-4 team_details">
                        <label for="place" class="frm-font">Place of Origin:</label>
                        <input name="place" type="text" class="frm-font form-control" id="place" placeholder="Enter place of origin" onblur="ValidateEmptyField(this,'Place oF origin cannot be empty')" required>
                    </div>
                    <div class="col-sm-4 team_details">
                        <label for="number" class="frm-font">Total Male Members:</label>
                        <input name="male_count" type="number" min="0" max="12" value="0" class="frm-font form-control" id="male_count" placeholder="Male Members count" required>
                    </div>
                    <div class="col-sm-4 team_details">
                        <label for="number" class="frm-font">Total Female Members:</label>
                        <input name="female_count" type="number" min="0" max="12" value="0" class="frm-font form-control" id="female_count" placeholder="Female Members count" required>
                    </div>
                
                </div>
            </div>
			<span class="label label-danger" style="font-size: 100%;background-color: #f90700;" id="error_message"></span>
		</div>
		<div data-panel="two-s1" class="div-s1">
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Note:</strong> For more info refer bookings page.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<h2>Package Details</h2>
				<div class="checkbox" style="padding-left: 3.5rem;margin-top: 15px;">
					<label for="customCheckBox5">
						<input type="checkbox" class="tours" id="customCheckBox5" onclick="eventCheckBox()">
						Select All
						</label>
				</div><br>
			<div class="form-group">
                <div class="row">
					<div class="col-sm-6">
						<h6>Exclusive North Goa Tour</h6>
						<div class="form-group">
						@foreach ($package_details as $spot)
							@if($spot->zone=="North Goa")
							<div class="checkbox" style="padding-left: 3.5rem;margin-top: 15px;">
								<label>
								<input type="checkbox" class="tours" id="{{$spot->id}}" name="spots[]" value="{{$spot->id}}">
								{{$spot->spot_name}}
								</label>
							</div>
							@endif
						@endforeach
						</div>
					</div>
					<div class="col-sm-6">
						<h6>Exclusive South Goa Tour</h6>
						<div class="form-group">
							@foreach ($package_details as $spot)
							@if($spot->zone=="South Goa")
							<div class="checkbox" style="padding-left: 3.5rem;margin-top: 15px;">
								<label>
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
		</div>
		<div data-panel="three-s1" class="div-s1">
			<h2>PickUp Details </h2>
			<!-- Date Picker Input -->
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="travel_date" class="frm-font">Travelling Date:</label>
                        <input type="date" class="frm-font form-control" name="travel_date" id="travel_date" onblur="CheckDate(this,'Travelling Date should be in Future')" required>
                    </div>
					 <div class="col-sm-6">
                        <label for="" class="frm-font">Pickup Point:</label>
						<select id="pickup_point" name="pickup_point" class="form-control">
							<option selected>Choose...</option>
							<option value="Panaji">Panaji</option>
							<option value="Margao">Margao</option>
						</select>
                    </div>
                </div>
			</div>
			<div class="form-group">
				<div class="checkbox">
					<label for="hotelbooking">
					<input type="checkbox" id="hotelbooking" name="hotelbooking" value="yes">
					Book Hotel</label>
				</div>
			</div>
			<div class="alert alert-warning" role="alert">
			  <strong>Note:</strong> For more info refer bookings page.
			</div>
			<span class="label label-danger" id="error_message1"></span><br>
			<input type = 'submit' class="btn btn-success" value = "Submit Details"/>
		</div>
		
	</form>
	</div>
	<br>
	<button class="button-s1-next btn btn-primary">Next</button>
</div>
</div>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/booking_script.js') }}"></script>
</section>
@endsection