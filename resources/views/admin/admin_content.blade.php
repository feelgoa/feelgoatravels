@extends('layouts.admin')

@section('content')
<section>
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-graph text-success"></i>
				</div>
				<div>{{ ADMIN_CONTENT_TITLE }}
					<div class="page-title-subheading">You can change the page content from here.</div>
				</div>
			</div>
			<div class="page-title-actions" style="display:none;"></div>
		</div>
	</div>

	<!-- Content -->
	<div class="row">
		<div class="col-md-12">
			<p>
				@foreach($data as $key => $val)
                    {{ html_entity_decode($val) }}
				 @endforeach
			</p>
		</div>
	</div>
	<div class="row">
	</div>
@endsection