@extends('layouts.app')

@section('content')
<section style="color: black;font-size: 20px;background-size: cover; background-image: url('../../assets/images/contact-us-4.jpg'); padding: 12px;">
<link rel="stylesheet" href="{{ URL::asset('assets/css/booking_style.css') }}">
	<div class="" style="padding: 0px 12px 0px 12px;">
        <div class="row"  >
            <div class="col-md-4" >
            </div>
            <div class="container" style="background-color: #0000008c;border-radius: 15px;margin-top:20px;">
				<form form id="formoid" class="frm-font" name="hotel_booking" id="eform" action="{{ route('hotel_bookings.insert') }}" method="POST">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group" >
								<div class="hotel-details-div">
									<h3 class="lable-from">Hotel Details</h3><br>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="check_in" class="frm-font lable-from">Check-in Date:</label>
											<input type="date" class="frm-font form-control travel_dates" name="check_in" id="check_in" onblur="CheckDate_after(this,'Check_In Date should be after one day from today','error_message4')" required>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<label for="room_type" class="frm-font lable-from">Room Type:</label>
												<select id="room_type" name="room_type" class="form-control" required>
													<option value="">Select</option>
													<option value="Single">Single</option>
													<option value="Double/Sharing">Double/Sharing</option>
												</select>
											</div>
											<div class="col-sm-6">
												<label for="room_count" class="frm-font lable-from">No of Rooms:</label>
												<input type="text" class="frm-font form-control" maxlength="2" id="room_count" value="1" name="room_count" placeholder="Enter No of rooms required" onblur="ValidateEmptyNumberField(this,'No of rooms must be integer and cannot be empty','error_message4')" required>
											</div>		
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="check_out" class="frm-font lable-from">Check-out Date:</label>
											<input type="date" class="frm-font form-control travel_dates" name="check_out" id="check_out" onblur="Checkout_date_check(this,'Check_Out Date should be atleast one day after Check_In date','error_message4')" required>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label for="member_count1" class="frm-font lable-from">Total Members Count:</label>
													<input name="member_count1" type="text" maxlength="2" class="frm-font form-control" id="member_count1" placeholder="Total Members count" onblur="ValidateEmptyNumberField(this,'Members Count must be integer and cannot be empty','error_message4')" required>
												</div>			
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label  for="hotel_req" class="form-labels">Any other requirements:</label>
											<textarea class="form-control" placeholder="Please mention any other speciic requirement regarding your hotel booking" name="hotel_req" rows="5" id="message" style="width:100%;resize: none;" onblur="ValidateEmptyField(this,'Message cannot be empty','error_message4')" required></textarea>
										</div>			
									</div>
								</div>
							</div>
						</div>
						<span class="label label-danger" id="error_message4"></span><br><br>
					</div>
					<input type = 'submit' class="btn btn-success" style="margin-bottom: 20px;height: 50px;" value = "Submit Hotel Booking Details"/>
				</form>
        	</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/booking_script.js') }}"></script>
</section>
@endsection