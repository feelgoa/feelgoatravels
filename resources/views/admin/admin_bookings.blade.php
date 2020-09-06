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
					<div class="page-title-subheading">List of all Bookings that you have recieved.</div>
				</div>
			</div>
			<div class="page-title-actions" style="display:none;"></div>
		</div>
	</div>

	<!-- Content -->
	<div class="row">
		<div class="col-md-12">
		<div class="table-wrapper">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<!-- From and to date-->
		<table class="table hover table-bordered" id="tours-table" class="table-formated">
  <thead class="thead-dark">
    <tr>
      <th scope="col">PNR number</th>
      <th scope="col">Pickup point</th>
	  <th scope="col">Date</th>
	  <th scope="col">Status</th>
	  <th scope="col">Name</th>
	  <th scope="col">Contact</th>
	  <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
	@foreach($data as $datalist)
		<tr>
			<td>{{ $datalist->booking_pnr }}</td>
			<td>{{ $datalist->pickup_point }}</td>
			<td>{{ $datalist->created_at }}</td>
			<td>{{ BOOKING_STATUS_VALUES[$datalist->status] }}</td>
			<td>{{ $datalist->name }}</td>
			<td>{{ $datalist->contact }}</td>
			<td><a href="{{ ADMIN_URL.ADMIN_BOOKINGS_URL.'/'.$datalist->booking_id}}"><i class="pe-7s-paper-plane" title="View"></i></a></td>
		</tr>
	@endforeach
  </tbody>
</table>
</div>
		</div>
	</div>
	<div class="row">
	</div>
@endsection