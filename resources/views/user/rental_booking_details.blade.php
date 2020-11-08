@extends('layouts.app')

@section('content')

<section  style="color: black;font-size: 20px;background-size: cover; background-image: url('../../assets/images/contact-us-4.jpg'); padding: 12px;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="{{ URL::asset('assets/css/rental_booking_details_style.css') }}">  

@foreach($vehicle_details as $vehicle)
<div class="container" style="background-color: #0000008c;border-radius: 15px;margin-top:20px;">
    <div class="columns">
        <div class="column">
            <div class="thumbnail-container">
                <img class="vehicle-img" src="{{ productImage($vehicle->vehicle_img)}}">
            </div>
        </div>
        <div class="column">
            <div class="details">
                <h1 class="r-h1">{{$vehicle->vehicle_name}}</h1>
                @if($vehicle->type=="wedding_car")
                <p class="price" style="display:none;">Rs {{$vehicle->rate}} (Per Hour)</p>
                @else
                <p class="price" style="display:none;">Rs {{$vehicle->rate}} (Per day)</p>
                @endif
                <p class="description r-color">{{$vehicle->desc}}</p>
                <p class="small-text r-color"><span>Capacity</span> {{$vehicle->capacity}}</p>
            </div> 
        </div>
    </div>
    <div class="row" style="padding-left: 2%;padding-right: 2%;">
        <form class="frm-font" name="vehicle_booking" action="{{ route('rental_bookings.insert') }}" method="POST">
            <input type="hidden" name="vehicle_id" id="vehicle_id" value="{{$vehicle->vehicle_id}}"/>
			{{ csrf_field() }}
                    <h3 class="lable-from">Booking Details</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="frm-font lable-from" for="name1">Name:</label>
                            <span class="required-field">*</span>
                            <input type="text" class="frm-font form-control" id="name1" name="name1" placeholder="Enter Full Name" onblur="ValidateEmptyField(this,'Name cannot be empty','error_message')" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-6">
							<label for="email" class="frm-font lable-from">Email:</label>
							<span class="required-field">*</span>
							<input type="email" class="frm-font form-control" name="email" id="email" placeholder="Enter email id" onblur="ValidateEmail(this,'Please your check email format','error_message')" required>
						</div>
						<div class="col-sm-6">
							<label for="tel" class="frm-font lable-from">Contact Number:</label>
							<span class="required-field">*</span>
							<input type="tel" size="10" class="frm-font form-control" id="contact" name="contact" placeholder="Contact number" required onblur="ValidateContact1(this,'Enter 10 digit mobile Number','error_message')">
						</div>
                    </div><br>
                    <div class="row" style="display:none;">
                        <div class="col-sm-6">
                        @if($vehicle->type=="wedding_car")
                        <label for="pickup_date" class="frm-font lable-from">Required Date:</label>
							<span class="required-field">*</span>
							<input type="date" class="frm-font form-control" name="pickup_date" id="pickup_date">
                        @else
                            <label for="pickup_date" class="frm-font lable-from">Travelling Date:</label>
							<span class="required-field">*</span>
							<input type="date" class="frm-font form-control" name="pickup_date" id="pickup_date">
                        @endif
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            @if($vehicle->type=="wedding_car")
                                <label class="frm-font lable-from" for="no_of_days">No of Hours:</label>
                                <span class="required-field">*</span>
                                <input type="text" maxlength="2" value="1" class="frm-font form-control" id="no_of_days" name="no_of_days" placeholder="Enter no of hours for which car is needed (Minimum 1 Hour)">
                            @else
                                <label class="frm-font lable-from" for="no_of_days">No of Days:</label>
                                <span class="required-field">*</span>
                                <input type="text" maxlength="2" value="1" class="frm-font form-control" id="no_of_days" name="no_of_days" placeholder="Number of Days (Minimum 1 Day)">
                            @endif
                            </div>
                        </div>
                    </div><br>
					<div class="form-group" style="display:none;">
						<div class="row">
							<div class="col-sm-6">
                                <label for="pickup_time" class="frm-font lable-from">Select Pickup time:</label>
                                <span class="required-field">*</span><br>
                                <input id="pickup_time" class="frm-font form-control" name="pickup_time">
                            </div>
                            <div class="col-sm-6">
                                <label for="total_amount" class="frm-font lable-from">Total Amount:</label>
                                <input type="text" readonly class="frm-font form-control" value="{{$vehicle->rate}}" name="total_amount" id="total_amount" required>
							</div>
						</div>
                    </div>
                    <div class="form-group pickup_location1" style="display:block;">
                        <label for="pickup_location" class="frm-font lable-from">Booking Specification:</label>
						<span class="required-field">*</span>
						<textarea rows="5" style="width:100%;resize: none;" id="pickup_loc" name="pickup_loc" placeholder="Enter all your booking specifications here." required onblur="ValidateEmptyField(this,'Enter your booking specification.','error_message')"></textarea>	
                    </div>
					<span class="label label-danger" style="font-size: 14px;margin-bottom:14px;white-space: normal;" id="error_message"></span></br>
            <input type = 'submit' class="btn btn-success" id="submit_btn" value = "Submit Booking Details" style="margin-bottom: 20px;height: 50px;"/>
        </form>
    </row>            
</div>
@endforeach
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script src='https://code.jquery.com/ui/1.10.3/jquery-ui.js'></script>	
<script src='https://awik.io/demo/webshop-zoom/Drift.min.js'></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/rental_booking_details_script.js') }}"></script>	
   
</section>
@endsection