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
                <img class="drift-demo-trigger vehicle-img" data-zoom="{{ productImage($vehicle->vehicle_img)}}" src="{{ productImage($vehicle->vehicle_img)}}">
            </div>
        </div>
        <div class="column">
            <div class="details">
                <h1 class="r-h1">{{$vehicle->vehicle_name}}</h1>
                @if($vehicle->type=="wedding_car")
                <p class="price">Rs {{$vehicle->rate}} (Per Hour)</p>
                @else
                <p class="price">Rs {{$vehicle->rate}} (Per day)</p>
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
                    <h3 class="lable-from">{{ucfirst($vehicle->type)}} Booking Details</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            @if($vehicle->type=="wedding_car")
                                <label class="frm-font lable-from" for="no_of_days">No of Hours:</label>
                                <span class="required-field">*</span>
                                <input type="text" maxlength="2" value="1" class="frm-font form-control" id="no_of_days" name="no_of_days" placeholder="Enter no of hours for which car is needed" required onblur="caltotal(this,'{{$vehicle->rate}}');ValidateEmptyNumberField(this,'No of Hours must be integer and cannot be empty','error_message');">
                            @else
                                <label class="frm-font lable-from" for="no_of_days">No of Days:</label>
                                <span class="required-field">*</span>
                                <input type="text" maxlength="2" value="1" class="frm-font form-control" id="no_of_days" name="no_of_days" placeholder="Number of Days" required onblur="caltotal(this,'{{$vehicle->rate}}');ValidateEmptyNumberField(this,'No of Days must be integer and cannot be empty','error_message');">
                            @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                                <label for="pickup_date" class="frm-font lable-from">Travelling Date:</label>
								<span class="required-field">*</span>
								<input type="date" class="frm-font form-control" name="pickup_date" id="pickup_date" onblur="CheckDate_after(this,'Travelling Date Date should be after one day from today','error_message')" required>
						</div>
                    </div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
                                <label for="pickup_time" class="frm-font lable-from">Select Pickup time:</label>
                                <span class="required-field">*</span><br>
                                <input id="pickup_time" class="frm-font form-control" name="pickup_time" required onblur="checktime(this,'Pickup time should be between 8am to 9pm','error_message')">
                            </div>
                            <div class="col-sm-6">
                                <label for="total_amount" class="frm-font lable-from">Total Amount:</label>
								<input type="text" readonly class="frm-font form-control" value="{{$vehicle->rate}}" name="total_amount" id="total_amount" required>
							</div>
						</div>
                    </div>
                    @if($vehicle->type=="bike")
                    <div class="bike_location">
                        <div class="form-group" >
                            <div class="checkbox">
                                <label class="lable-from" for="selectlocation">
                                <input type="checkbox" id="selectlocation" name="selectlocation" value="yes">Select Pickup Point</label>
                            </div>
                        </div>
                        <div class="pickup_point" style="display:none;">
                            <div class="form-group">
                                <label for="pickup_point" class="frm-font lable-from">Pickup Point:</label>
								<span class="required-field">*</span>
								<select id="pickup_point" name="pickup_point" class="form-control" onblur="ValidateDropdownfield(this,'Select Pickup Point From Dropdown','error_message')">
									<option value="">Select</option>
									<option value="Colva">Colva</option>
									<option value="Margao">Margao</option>
								</select>	
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group pickup_location1" style="display:block;">
                        <label for="pickup_location" class="frm-font lable-from">Enter Pickup location:</label>
						<span class="required-field">*</span>
						<textarea rows="5" style="width:100%;resize: none;" id="pickup_loc" name="pickup_loc" placeholder="Enter full address for pickup" onblur="ValidateEmptyField(this,'Enter address for pickup','error_message')"></textarea>	
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