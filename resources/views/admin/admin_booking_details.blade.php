@extends('layouts.admin')

@section('content')
<section>
<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-note2"></i>
				</div>
				<div>{{ ADMIN_BOOKING_TITLE }}
					<div class="page-title-subheading">Details of Booking.</div>
				</div>
			</div>
			<div class="page-title-actions" style="display:none;"></div>
		</div>
	</div>

	<!-- Content -->
	<div class="container">

</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12" style="background-color:#fafbfc;">
				<div style="padding:12px;">
					<div>
					<table class="table hover table-bordered" id="" class="table-formated">
								<thead class="thead-dark">
									<th scope="col">Personal Details</th>
								</thead>
						</table>
						<div class="container-div darker">
							<div  class="">
								<span>Name: </span>
								<span>{{ $data[0]->name }}</span>
							</div>
							<div  class="">
								<span>Phone: </span>
								<span>{{ $data[0]->contact }}</span>
							</div>
							<div  class="">
								<span>Age: </span>
								<span>{{ $data[0]->age }}</span>
							</div>
							<div  class="">
								<span>Email: </span>
								<span>{{ $data[0]->email }}</span>
							</div>
							<div  class="">
								<span>Place of Birth: </span>
								<span>{{ $data[0]->place }}</span>
							</div>
							<div  class="">
								<span>Gender: </span>
								<span>{{ $data[0]->gender }}</span>
							</div>
						</div>
						<table class="table hover table-bordered" id="" class="table-formated">
								<thead class="thead-dark">
									<th scope="col">Tour Booking Details</th>
								</thead>
						</table>
						<div class="container-div darker">
							<div  class="">
								<span>Booking PNR: </span>
								<span>{{ $data[0]->booking_pnr }}</span>
							</div>
							<div  class="">
								<span>Pickup point: </span>
								<span>{{ $data[0]->pickup_point }}</span>
							</div>
							<div  class="">
								<span>Bus type: </span>
								<span>{{ $data[0]->bus_type }}</span>
							</div>
							<div  class="">
								<span>Booking Date: </span>
								<span>{{ date('d/m/Y', strtotime($data[0]->created_at))  }}</span>
							</div>
							<div  class="">
								<span>Male Members: </span>
								<span>{{ $data[0]->male_count }}</span>
							</div>
							<div  class="">
								<span>Female Members: </span>
								<span>{{ $data[0]->female_count }}</span>
							</div>
							<div  class="">
								<span>Total Members: </span>
								<span>{{ (int)$data[0]->female_count + (int)$data[0]->male_count }}</span>
							</div>
							<div  class="">
								<span>Status: </span>
								<span>{{ BOOKING_STATUS_VALUES[(int)$cur_status->status]  }}</span>
							</div>
							<span>Traveling Days</span>
							@foreach($traveling_dates as $traveling_dates1)
								<div  class="">
								<span>Day {{ $traveling_dates1->day}}: </span>
								<span>{{ date('d/m/Y', strtotime($traveling_dates1->travel_date)) }}</span>
								</div>
							@endforeach
						</div>
						<div class="container-div darker" style="display:none;">
							<b><p>Hotel Booking Details</p></b>
							@foreach($hotel_stay as $hotel_stay1)
								<div  class="">
									<span>CheckIn: </span>
									<span> {{ date('d/m/Y', strtotime($hotel_stay1->check_in_date)) }}</span>
								</div>
								<div  class="">
									<span>CheckOut: </span>
									<span> {{ date('d/m/Y', strtotime($hotel_stay1->check_out_date)) }}</span>
								</div>
								<div  class="">
									<span>Room Type: </span>
									<span> {{ $hotel_stay1->room_type}}</span>
								</div>
								<div  class="">
									<span>Number of Rooms: </span>
									<span> {{ $hotel_stay1->room_count}}</span>
								</div>
								<div  class="">
									<span>Additional Information: </span>
									<span> {{ $hotel_stay1->extra_requirements}}</span>
								</div>
							@endforeach
						</div>
						<div class="">
							<b><p>Status Update</p></b>
							<div id="status_change_div">
								<input type="hidden" id="bkngid" value="{{ $booking_id }}">
								<input type="hidden" id="curstatus" value="{{ $cur_status->status }}">
								<input type="hidden" id="bkngtype" value="1">
								<select id="status_dropdown">
								@foreach(BOOKING_STATUS_VALUES as $key => $value)
								@if ($key == $cur_status->status)
								<option value="{{ $key }}" selected style="background-color:#ddd;">{{ $value }}</option>
								@else
								<option value="{{ $key }}">{{ $value }}</option>
								@endif

								@endforeach
								</select>
								<textarea id="status_desc" class="textarea-style" style="" oninput="auto_grow(this)" placeholder="Enter description if required."></textarea>
								<button type="button" class="btn btn-info" id="update_status_btn">Update status</button>
							</div>
							<table class="table hover table-bordered" id="" class="table-formated">
								<thead class="thead-dark">
									<tr>
									<th scope="col">Status</th>
									<th scope="col">Date</th>
									<th scope="col">Description</th>
									</tr>
								</thead>
								<tbody>
							@foreach($status_list as $status_list_item)
								<tr>
									<td> {{ BOOKING_STATUS_VALUES[(int)$status_list_item->status] }} </td>
									<td> {{ date('d/m/Y', strtotime($status_list_item->created_at)) }} </td>
									<td> {{  $status_list_item->desc }} </td>
								</tr>
							@endforeach
							</tbody>
							</table>
						</div>
						<div style="display:none;" class="">
							<table class="table hover table-bordered" id="" class="table-formated">
								<thead class="thead-dark">
									<th scope="col">Conversation Details</th>
								</thead>
							</table>		
							@foreach($contact_us_response as $datalist)
								@if($datalist->lastname == 'X')
								<div class="container-div darker">
									<img src="/assets/images/faces-clipart/pic-feel-goa.png" alt="Feel Goa" class="right" style="width:100%;">
									<p>{{ $datalist->message }}</p>
									<span class="time-left">{{ date('d/m/Y', strtotime($datalist->created_time)) }}</span>
								</div>
								@else
								<div class="container-div">
									<img src="/assets/images/faces-clipart/pic-1.png" alt="Customer" style="width:100%;">
									<p>{{ $datalist->message }}</p>
									<span class="time-right">{{ date('d/m/Y', strtotime($datalist->created_time)) }}</span>
								</div>
								@endif
							@endforeach
						</div>
					</div>
					<div style="display:none;" class="container-div darker">
						<form name="resp_form" id="resp_form" method="POST">
							<div>
								<input type="hidden" id="current_id" value="{{ $current_contact_us_id }}"/>
								<p><textarea id="resp-value"class="textarea-style" style="background-color: #f1f1f1;" oninput="auto_grow(this)" placeholder="Enter your comment here."></textarea></p>
							</div>
							<div>
							<span class="label label-danger"
                                style="font-size: 14px;margin-bottom:14px;white-space: normal; display:none;"
                                id="error_message"></span></br></br>
							</div>
							<div>
							<button type="button" class="btn btn-info" id="myBtn">Respond Back</button>
							</div>
						</form>
					</div>
					<table class="table hover table-bordered" id="" class="table-formated">
								<thead class="thead-dark">
									<th scope="col">Payment link Gereration</th>
								</thead>
							</table>
					<div style="" class="container-div darker">
						<div id="hotel_calc" style="display:none;">
							<b><p>Hotel Details</p></b>
							<div>
								<table>
								<tr>
									<td>Name :</td>
									<td>Colmar</td>
								<tr>
									<td>Place :</td>
									<td>Colva Beach Road, Colva</td>
								<tr>
									<td>Check IN :</td>
									<td>28/07/2020</td>
								</tr>
								<tr>
									<td>Check IN :</td>
									<td>29/07/2020</td>
								</tr>
								<tr>
									<td>Total Days :</td>
									<td>1</td>
								</tr>
								<tr>
									<td>Price per night :</td>
									<td><input type="text"></td>
								</tr>
								<tr>
									<td>Total price :</td>
									<td>650 Rs</td>
								</tr>
								<tr>
								<td colspan="2"><button type="button" class="btn btn-info" id="">Calculate Hotel Price</button></td>
								</tr>
								</table>
							</div>
						</div>
						<div id="tour_calc" style="display:none;">
							<b><p>Tour Details</p></b>
							<div>
								<table>
								<tr>
									<td>Day 1:</td>
									<td>250 Rs</td>
								<tr>
									<td>Day 2:</td>
									<td>250 Rs</td>
								<tr>
									<td>Day 3:</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Day 4:</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Total Days :</td>
									<td>2</td>
								</tr>
								<tr>
									<td>Total price :</td>
									<td>500 Rs</td>
								</tr>
								</table>
							</div>
						</div>
						<div>
							<table>
								<tr>
								<input type="hidden" id="booking_name" value="{{ $data[0]->name }}">
								<input type="hidden" id="booking_count" value="{{ (int)$data[0]->female_count + (int)$data[0]->male_count }}">
								<input type="hidden" id="booking_pickuppoint" value="{{ $data[0]->pickup_point }}">
								<input type="hidden" id="booking_pnr" value="{{ $data[0]->booking_pnr }}">
								<input type="hidden" id="booking_refid" value="{{ $booking_id }}">
								<input type="hidden" id="booking_email" value="{{ $data[0]->email }}">

									<td colspan="2"><button type="button" class="btn btn-info" id="gen_email">Generate Payment Email.</button></td>
								</tr>
							</table>
						</div>
						<div id="email_block">
						<br>
							<p><textarea id="email_container"class="textarea-style" style="background-color: #f1f1f1;" oninput="auto_grow(this)" placeholder="Enter extra email content if required."></textarea></p>
							<button type="button" class="btn btn-info" id="payment-link-btn">Send Email</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row"> 
	</div>
@endsection