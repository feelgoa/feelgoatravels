@extends('layouts.app')

@section('content')
<section id="" class="slider">
<div style="background-image:url('../../assets/images/contact-us-4.jpg');">
	<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div>
				<p style="color:white;padding-top:12px;">REAL GOAN EXPERIENCE</p>
			</div>
			<p  style="color:white;" align="justify">
				We at feelGoa have choosen the best locations so that you can enjoy the beauty of Goa. See the top 16 places (7-North and 9-South) that put Goa on the International Tourist Map.
			</p>
		</div>
		<div>
			<div class="col-md-6 col-sm-6">
				<div class="locations-header">
					<p><b>Exclusive North Goa Tour</b></p>
				</div>
				<div>
					<ul style="padding-left: 0px;list-style-type: none;">
						@foreach ($package_details as $spot)
							@if($spot->zone=="North Goa")
							<li class="spots-li" style="padding: 12px;background-color: #0000008c;border-radius: 15px;margin: 0 0 12px 0;">
								<div id="DESCspot{{$spot->spot_id}}N" class="spots-div">
								@if($spot->img_path!="")
									<div style="height:100px; width:100px; float:left; padding-right:12px;border">
										<img src="{{$spot->img_path}}" height="100%" width="100%" class="spots-img" style="border-radius: 15px 0px 0px;">
									</div>
								@endif
								@if($spot->extra_info!="")
									<p style="color:white;"><b>Spot {{$spot->spot_id}} - </b>{{$spot->spot_name}} ({{($spot->extra_info)}})
									<i class="fa fa-info-circle" aria-hidden="true" title="{{$spot->tooltip_text}}"></i></p>
									<p  style="color:white;"align="justify">{{$spot->desc}}</p>
								@else
									<p style="color:white;"><b>Spot {{$spot->spot_id}} - </b>{{$spot->spot_name}}
									<p style="color:white;"align="justify">{{$spot->desc}}</p>
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
					<ul style="padding-left: 0px;list-style-type: none;">
					@foreach ($package_details as $spot)
							@if($spot->zone=="South Goa")
							<li class="spots-li" style="padding: 12px;background-color: #0000008c;border-radius: 15px;margin: 0 0 12px 0;">
								<div id="DESCspot{{$spot->spot_id}}N" class="spots-div">
								@if($spot->img_path!="")
									<div style="height:100px; width:100px; float:left; padding-right:12px;">
										<img src="{{$spot->img_path}}" height="100%" width="100%" class="spots-img" style="border-radius: 15px 0px 0px;">
									</div>
								@endif
								@if($spot->extra_info!="")
									<p style="color:white;"><b>Spot {{$spot->spot_id}} - </b>{{$spot->spot_name}} ({{($spot->extra_info)}})
									<i class="fa fa-info-circle" aria-hidden="true" title="{{$spot->tooltip_text}}"></i></p>
									<p style="color:white;" align="justify">{{$spot->desc}}</p>
								@else
									<p style="color:white;"><b>Spot {{$spot->spot_id}} - </b>{{$spot->spot_name}}
									<p style="color:white;" align="justify">{{$spot->desc}}</p>
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
	</div>
</div>
</section>
@endsection