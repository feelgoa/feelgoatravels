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
		<label for="firstname" class="form-labels">Your booking details for PNR number {{ $pnrno }}</label>
		<table>
		<tr>
		<td><label class="form-labels">Bookers Name<lable>
		</td>
		<td class="table-mid-padding"><label class="form-labels">:<lable>
		</td>
		<td><label class="form-labels">{{ $details['booking'][0]['name'] }}<lable>
		</td>
		</tr>
		<tr>
		<td><label class="form-labels">People Travelling<lable>
		</td>
		</td>
		<td class="table-mid-padding"><label class="form-labels">:<lable>
		</td>
		<td>
			<b>
				<label class="form-labels">{{ $details['booking'][0]['totalcount'] }} 
					({{ $details['booking'][0]['male_count'] }} Male and {{ $details['booking'][0]['female_count'] }} Female)
				</label>
			</b>
		</td>
		</tr>
		<tr>
		<td><label class="form-labels">Status<lable>
		</td>
		</td>
		<td class="table-mid-padding"><label class="form-labels">:<lable>
		</td>
		<td><b><label class="form-labels">{{ BOOKING_STATUS_VALUES[(int)$curr_status->status]  }}</label></b>
		</td>
		</tr>
		<tr>
		<td><label class="form-labels">Traveling dates<lable>
		</td>
		</td>
		<td class="table-mid-padding"><label class="form-labels">:<lable>
		</td>
		<td>
			@foreach($travel_details as $travel_dates)
				@if($loop->first)
				<b><label class="form-labels"> {{ date('d/m/Y', strtotime($travel_dates->travel_date)) }} </label></b>
				@elseif ($loop->last)
				<b><label class="form-labels"> and {{ date('d/m/Y', strtotime($travel_dates->travel_date)) }} </label></b>
				@else
				<b><label class="form-labels">, {{ date('d/m/Y', strtotime($travel_dates->travel_date)) }}</label></b>
				@endif
					
			@endforeach
		</td>
		</tr>
		</table>
		<div>
			<i><p class="form-labels" style="padding-top:12px;">If you want to get more details, you can contact us by clicking <a href="{{ SITE_URL.CONTACTUS_URL.'/'.encrypt_code($pnrno) }} "><u>here</u></a>.</i></p>
		</div>
	</div>
</div>
</div>
	</div>
	</div>
</section>
@endsection