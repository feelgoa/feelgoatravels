@extends('layouts.app')

@section('content')
<section id="" class="slider col-md-12 col-sm-12">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div>
				<p>REAL GOAN EXPERIENCE</p>
			</div>
			<p align="justify">
				We at feelGoa have choosen the best locations so that you can enjoy the beauty of Goa. See the top 16 places (7-North and 9-South) that put Goa on the International Tourist Map.
			</p>
		</div>
		<div>
			<div class="col-md-6 col-sm-6">
				<div class="locations-header">
					<p><b>Exclusive North Goa Tour</b></p>
				</div>
				<div>
					<ul style="padding-left: 0px;">
						@foreach ($package_details as $spot)
							@if($spot->zone=="North Goa")
							<li class="spots-li">
								<div id="DESCspot1N" class="spots-div">
								@if($spot->img_path!="")
									<div style="height:100px; width:100px; float:left; padding-right:12px;">
										<img src="{{$spot->img_path}}" height="100%" width="100%" class="spots-img">
									</div>
								@endif
								@if($spot->extra_info!="")
									<p><b>spot {{$spot->spot_id}} - </b>{{$spot->spot_name}} ({{($spot->extra_info)}})
									<i class="fa fa-info-circle" aria-hidden="true" title="{{$spot->tooltip_text}}"></i></p>
									<p align="justify">{{$spot->desc}}</p>
								@else
									<p><b>spot {{$spot->spot_id}} - </b>{{$spot->spot_name}}
									<p align="justify">{{$spot->desc}}</p>
								@endif
								</div>
							</li>
							@endif
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="locations-header" >
					<p><b>Exclusive South Goa Tour</b></p>
				</div>
				<div>
					<ul style="padding-left: 0px;">
					@foreach ($package_details as $spot)
							@if($spot->zone=="South Goa")
							<li class="spots-li">
								<div id="DESCspot1N" class="spots-div">
								@if($spot->img_path!="")
									<div style="height:100px; width:100px; float:left; padding-right:12px;">
										<img src="{{$spot->img_path}}" height="100%" width="100%" class="spots-img">
									</div>
								@endif
								@if($spot->extra_info!="")
									<p><b>spot {{$spot->spot_id}} - </b>{{$spot->spot_name}} ({{($spot->extra_info)}})
									<i class="fa fa-info-circle" aria-hidden="true" title="{{$spot->tooltip_text}}"></i></p>
									<p align="justify">{{$spot->desc}}</p>
								@else
									<p><b>spot {{$spot->spot_id}} - </b>{{$spot->spot_name}}
									<p align="justify">{{$spot->desc}}</p>
								@endif
								</div>
							</li>
							@endif
					@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection