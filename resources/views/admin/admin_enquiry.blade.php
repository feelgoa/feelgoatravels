@extends('layouts.admin')

@section('content')
<section>
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-graph"></i>
				</div>
				<div>{{ ADMIN_ENQUIRY_TITLE }}
					<div class="page-title-subheading">List of all Enquiries that you have recieved.</div>
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
		<table class="table hover table-bordered" id="enquiry-table" class="table-formated">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Message in Brief</th>
	  <th scope="col">Recieved Date</th>
	  <th scope="col">PNR Number</th>
	  <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
	@foreach($data as $datalist)
		<tr>
			<td>{{ $datalist->firstname }} {{ $datalist->lastname }}</td>
			<td>{!! \Illuminate\Support\Str::limit($datalist->message, 100, $end='... <a href="'.ADMIN_URL.ADMIN_ENQUIRYT_URL.'/'.$datalist->id.'">Read more</a>' ) !!}
			</td>
			<td>{{ date('d/m/Y', strtotime($datalist->created_time)) }}</td>
			<th scope="col">{{ $datalist->ref_id }}</th>
			@if ($datalist->link ==  0)
				<td><a href="{{ ADMIN_URL.ADMIN_ENQUIRYT_URL.'/'.encrypt_code($datalist->id)}}"><i class="pe-7s-paper-plane" title="View"></i></a></td>
			@else
				<td><a href="{{ ADMIN_URL.ADMIN_ENQUIRYT_URL.'/'.encrypt_code($datalist->link)}}"><i class="pe-7s-paper-plane" title="View"></i></a></td>
			@endif

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