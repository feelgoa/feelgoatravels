@extends('layouts.app')

@section('content')
<section class="booking_body">
<link rel="stylesheet" href="{{ URL::asset('assets/css/booking_style.css') }}">
<div class="container">
<div class="col-md-3">
</div>
<div class="form-s1 col-md-7" style="background-color: #0000008c;border-radius: 15px;padding: 12px;margin-top:12px;">
	<input id="one-s1" class="radio-s1" type="radio" name="stage" checked="checked" />
	<input id="two-s1" class="radio-s1" type="radio" name="stage" />
	<input id="three-s1" class="radio-s1" type="radio" name="stage" />
	<input id="four-s1" class="radio-s1" type="radio" name="stage" />

	<div class="stages-s1">
		<label for="one-s1" class="label-s1">1</label>
		<label for="two-s1" class="label-s1">2</label>
		<label for="three-s1" class="label-s1">3</label>
		<label for="four-s1" class="label-s1">4</label>
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
						<div class="form-check" style="display: inline-flex;">
							<div class="form-check" style="padding-right:12px;">
							  <input class="form-check-input" type="radio" name="gender" id="b1" value="male" required>
							  <label class="form-check-label lable-from" for="b1">Male</label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="gender" id="b2" value="female" required>
							  <label class="form-check-label lable-from" for="b2">Female</label>
							</div>
						</div>
					</div>
					<div class="col-sm-6 team_details">
							<label for="age" class="frm-font lable-from">Age:</label>
							<span class="required-field">*</span>
							<input type="text" class="frm-font form-control" maxlength="2" id="age" name="age" placeholder="Enter Age" onblur="ValidateEmptyNumberField(this,'Age must be integer and cannot be empty')" required>
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
						<input name="male_count" type="text" maxlength="2" value="0" class="frm-font form-control" id="male_count" placeholder="Male Members count" required>
					</div>
					<div class="col-sm-4 team_details">
						<label for="number" class="frm-font lable-from">Total Female Members:</label>
						<input name="female_count" type="text" maxlength="2" value="0" class="frm-font form-control" id="female_count" placeholder="Female Members count"  required>
					</div>
				</div>
			</div>
			<div class="alert alert-warning" role="alert">
				<strong>Note:</strong> If the total member count exceeds 10, then you are allowed to choose your spots in the next tab.
			</div>

			<span class="label label-danger" style="font-size: 14px;margin-bottom:14px;white-space: normal;" id="error_message"></span></br>
		</div>
		<div data-panel="two-s1" class="div-s1">
			<h2 class="lable-from">Package Details</h2>
				<div class="row">
					<div class="spot-container">
						<h4 class="lable-from">Exclusive North Goa Tour( Day 1)</h4>
						<div class="form-group">
							<label for="travel_date1" class="frm-font lable-from">Travelling Date:</label>
							<span class="required-field">*</span>
							<input type="date" class="frm-font form-control travel_dates" name="travel_date1" id="travel_date1" onblur="CheckSameDate(this,'Travelling Date should be after one day from today and different from other travelling dates','error_message1')" required>
						</div>
					</div>
				
					<div class="col-sm-6">
						<h6 class="lable-from">Included in Package</h6>
						<div class="form-group">
						@foreach ($package_details as $spot)
							@if($spot->zone=="North Goa" and $spot->extra_info=="" and $spot->day=="1")
							<div class="checkbox" style="padding-left: 1.5rem;margin-top: 10px;">
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
						<h6 class="lable-from">Extra Charges May Apply</h6>
						<div class="form-group">
						@foreach ($package_details as $spot)
							@if($spot->zone=="North Goa" and $spot->extra_info!="" and $spot->day=="1")
							<div class="checkbox" style="padding-left: 1.5rem;margin-top: 10px;">
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
				<div class="row">
				    <div class="spot-container">
						<h4 class="lable-from">Exclusive South Goa Tour (Day 2)</h4>
						<div class="form-group">
							<label for="travel_date2" class="frm-font lable-from">Travelling Date:</label>
							<span class="required-field">*</span>
							<input type="date" class="frm-font form-control travels_dates" name="travel_date2" id="travel_date2" onblur="CheckSameDate(this,'Travelling Date should be after one day from today and different from other travelling dates','error_message1')" required>
						</div>
					</div>
					<div class="col-sm-6">
						<h6 class="lable-from">Included in Package</h6>
						<div class="form-group">
							@foreach ($package_details as $spot)
							@if($spot->zone=="South Goa" and $spot->extra_info=="" and $spot->day=="2")
							<div class="checkbox" style="padding-left: 1.5rem;margin-top: 10px;">
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
						<h6 class="lable-from">Extra Charges May Apply</h6>
						<div class="form-group">
						@foreach ($package_details as $spot)
							@if($spot->zone=="South Goa" and $spot->extra_info!="" and $spot->day=="2")
							<div class="checkbox" style="padding-left: 1.5rem;margin-top: 10px;">
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
				<label class="lable-from">Travel type: </label>
				<span class="required-field">*</span><br>
				<div class="radio-form2">
					<input class="form-check-input" type="radio" name="package_type" id="p1" value="single" required>
					<label class="form-check-label lable-from" for="p1">Single</label>
				</div>
				<div class="radio-form2">
					<input class="form-check-input" type="radio" name="package_type" id="p2" value="couple" required>
					<label class="form-check-label lable-from" for="p2">Couple</label>
				</div>
				<div class="radio-form2">
					<input class="form-check-input" type="radio" name="package_type" id="p3" value="familyless5" required>
					<label class="form-check-label lable-from" for="p3">Family (Less than 5)</label>
				</div>
				<div class="radio-form2">
					<input class="form-check-input" type="radio" name="package_type" id="p4" value="group" required>
					<label class="form-check-label lable-from" for="p4">Group</label>
				</div>
			<div class="alert alert-warning" role="alert">
			  <strong>Note:</strong> For more info on places you can click <a style="color:#CE3232;" href="/locations" target="_blank">here</a>.
			</div>
			<span class="label label-danger" id="error_message1"></span><br>
		</div>
		<div data-panel="three-s1" class="div-s1">
			<h2 class="lable-from">Extra Package for Group</h2>
			<div class="row">
					<div class="col-sm-6">
					    <h4 class="lable-from">Day 3</h4>
						<div class="form-group">
							<label for="travel_date3" class="frm-font lable-from">Travelling Date:</label>
							<span class="required-field">*</span>
							<input type="date" class="frm-font form-control travelling_dates" name="travel_date3" id="travel_date3" onblur="CheckSameDate(this,'Travelling Date should be after one day from today and different from other travelling dates','error_message2')">
						</div>
						<div class="form-group">
						@foreach ($package_details as $spot)
							@if($spot->day=="3")
							<div class="checkbox" style="padding-left: 1.5rem;margin-top: 10px;">
								<label class="lable-from">
								<input type="checkbox" class="tour_extra" id="{{$spot->id}}" name="spots[]" value="{{$spot->id}}">
								{{$spot->spot_name}}
								</label>
							</div>
							@endif
						@endforeach
						</div>
					</div>
					<div class="col-sm-6">
						<h4 class="lable-from">Day 4</h4>
						<div class="form-group">
							<label for="travel_date4" class="frm-font lable-from">Travelling Date:</label>
							<span class="required-field">*</span>
							<input type="date" class="frm-font form-control travelling_dates" name="travel_date4" id="travel_date4" onblur="CheckSameDate(this,'Travelling Date should be after one day from today and different from other travelling dates','error_message2')" required>
						</div>
						<div class="form-group">
						@foreach ($package_details as $spot)
							@if($spot->day=="4")
							<div class="checkbox" style="padding-left: 1.5rem;margin-top: 10px;">
								<label class="lable-from">
								<input type="checkbox" class="tour_extra" id="{{$spot->id}}" name="spots[]" value="{{$spot->id}}">
								{{$spot->spot_name}}
								</label>
							</div>
							@endif
						@endforeach
						</div>
					</div>
				</div>
				<div class="alert alert-warning" role="alert">
					<strong>Note:</strong>These places are optional and are not included in the package. Extra Charges may apply.
				</div>
				<span class="label label-danger" id="error_message2"></span><br>
		</div>
		<div data-panel="four-s1" class="div-s1">
		<h2 class="lable-from">PickUp Details </h2>
			<!-- Date Picker Input -->
			<div class="form-group">
				<div class="row">
					 <div class="col-sm-6">
						<label for="pickup_point" class="frm-font lable-from">Pickup Point:</label>
						<span class="required-field">*</span>
						<select id="pickup_point" name="pickup_point" class="form-control" onblur="ValidateDropdownfield(this,'Select Pickup Point From Dropdown')" required>
							<option value="">Select</option>
							<option value="Colva">Colva</option>
							<option value="Margao">Margao</option>
						</select>
					  </div>
					  <div class="col-sm-6">
					    <label for="bus_type" class="frm-font lable-from">Bus Type:</label>
						<span class="required-field">*</span>
					  	<div class="switch">
							<input type="radio" class="switch-input" name="bus_type" value="Non-AC" id="Non-AC" checked>
							<label for="Non-AC" class="switch-label switch-label-off">Non AC</label>
							<input type="radio" class="switch-input" name="bus_type" value="AC" id="AC">
							<label for="AC" class="switch-label switch-label-on">AC</label>
							<span class="switch-selection"></span>
						</div>
					  </div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h3 class="terms">TERMS AND CONDITIONS</h3> 
						</br>
						@foreach ($terms_conditions as $t_c)
							{!! $t_c->content !!}
						@endforeach
					</div>
					<input type="checkbox"  name="terms" id="terms" value="True" required style="margin-left: 3%;width: 20px;height: 20px;">
					<label class="lable-from" for="terms" style="margin-left: 2%;font-size:20px;">I agree to these terms and conditions: </label><span class="required-field">*</span>
				</div>
			</div>
			<div class="form-group" style="display:none">
				<div class="checkbox">
					<label for="hotelbooking lable-from">
					<input type="checkbox" id="hotelbooking" name="hotelbooking" value="yes">
					Book Hotel</label>
				</div>
			</div>
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