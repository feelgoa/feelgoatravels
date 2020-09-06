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
					<div>
					@foreach($data as $datalist)
						@if($datalist->lastname != 'X')
							<span>This is your conversation tree with <b>{{ $datalist->firstname }}  {{ $datalist->lastname }}</b>.</span>
							@break
						@endif
					@endforeach
					</div>
					@foreach($data as $datalist)
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
					<div class="container-div darker">
						<form name="resp_form" id="resp_form" method="POST">
							<div>
								<input type="hidden" id="current_id" value="{{ $current_id }}"/>
								<p><textarea id="resp-value"class="textarea-style" style="background-color: #f1f1f1;" oninput="auto_grow(this)" placeholder="Enter your comment here."></textarea></p>
							</div>
							<div>
							<span class="label label-danger"
                                style="font-size: 14px;margin-bottom:14px;white-space: normal; display:none;"
                                id="error_message"></span></br></br>
							</div>
							<div>
							<button type="button" class="btn btn-info" id="myBtn">Reply</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row"> 
	</div>
@endsection