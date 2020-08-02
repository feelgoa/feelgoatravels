@extends('layouts.admin')

@section('content')
<section>
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-graph text-success"></i>
				</div>
				<div>{{ ADMIN_ENQUIRY_TITLE }}
					<div class="page-title-subheading">Enquiry Details.</div>
				</div>
			</div>
			<div class="page-title-actions" style="display:none;"></div>
		</div>
	</div>

	<!-- Content -->
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12" style="background-color:#fafbfc;">
				<div style="padding:12px;">
					@foreach($data as $datalist)
					@if($datalist->lastname == 'X')
					<div class="container-div darker">
						<img src="/assets/images/faces-clipart/pic-feel-goa.png" alt="Feel Goa" class="right" style="width:100%;">
						<p>{{ $datalist->message }}</p>
						<span class="time-left">{{ date('d/m/Y', strtotime($datalist->created_at)) }}</span>
					</div>
					@else
					<div class="container-div">
						<img src="/assets/images/faces-clipart/pic-1.png" alt="Cuatomer" style="width:100%;">
						<p>{{ $datalist->message }}</p>
						<span class="time-right">{{ date('d/m/Y', strtotime($datalist->created_at)) }}</span>
					</div>
					@endif
					@endforeach
					<div>
						<button>Respond</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
	</div>
@endsection