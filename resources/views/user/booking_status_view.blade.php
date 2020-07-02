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
		<td><label class="form-labels">Booking Date<lable>
		</td>
		</td>
		<td class="table-mid-padding"><label class="form-labels">:<lable>
		</td>
		<td>
			<b><label class="form-labels">North Goa 27-06-2020</label></b></br>
			<b><label class="form-labels">South Goa 28-06-2020</label></b>
			<b><label class="form-labels">Palolem and Agonda 29-06-2020</label></b>
			<b><label class="form-labels">Dudhsagar 30-06-2020</label></b>
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
		<td><b><label class="form-labels">{{ $details['booking'][0]['status'] }}</label></b>
		</td>
		</tr>
		</table>
		<div>
			<i><p class="form-labels" style="padding-top:12px;">If you want to get more details, you can contact us by clicking <a href='http://127.0.0.1/contact-us'><u>here</u></a>. Please dont forget to mention your PNR number in the description.</i></p>
		</div>
	</div>
</div>
</div>
	</div>
	</div>
</section>
@endsection