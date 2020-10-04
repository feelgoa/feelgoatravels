@extends('layouts.app')

@section('content')
<section id="home" class="slider" data-stellar-background-ratio="0.5">
	<div class="row">
		<div class="owl-carousel owl-theme">
			@foreach ($slides as $slide)
			<div class="item" style="background-image: url({{ $slide->img_path }})">
				<div class="caption">
					<div class="container">
						<div class="col-md-8 col-sm-12">
								<h3></h3>
								<h1>{{ $slide->img_name }}</h1>
								@if($slide->link !="" )
									<a href="{{ $slide->link }}" class="section-btn btn btn-default smoothScroll">{{$slide->button_name}}</a>
								@endif
						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<br>
				<address class="wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
					<p align="justify" id="home-basic-info">
						<i class="fa fa-quote-left colourquote" aria-hidden="true"></i>
						It began with an idea for serving people. I was selling tickets for various tourists and was providing travel services to my customers. 
						I used to hire tourist buses from my friends. It struck to me one day, why don't I own a bus of my own rather then renting it. Thats what made me go ahead
						and buy my first bus in 2005. I always had this dream to give a great feeling to my customers about Goa and all its beautiful heritages. And that is how feelGoa came
						into existence. Since then I have been working to take this dream ahead every single day. My son, Mr. Eliston Gomes has also willingly agreed to be a part of
						this journey. Currently, we own 15 buses, provide rental taxi services and make arrangements for guest house stays.
						<i class="fa fa-quote-right colourquote" aria-hidden="true"></i>
						<br>
					</p>
				</address>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<address class="wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
					<p class="colordark">
						- Eulogio Gomes (Proprietor - feelGoa)
					</p>
				</address>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<address class="wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
					<p>
						<i>
						Motto : Once with us, Always with us, A blessing many envy
						</i>
					</p>
				</address>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 com-sm-12">
				<address class="wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
					<p>
						We provide you a tour service to the most famous places in Goa. Along with that you can also book for hotels and rental bikes for easy commute on your visit to Goa. Recently we have also started providing rental service for wedding cars with driver.
					</p>
				</address>
			</div>
		</div>
	</div>

	<div class="container" style="display:none;">
		<div class="row">
			<div class="col-md-12 col-sm-12 tldiv">
				<div class="col-md-12 col-sm-12 colourbanner">
					<h3 class="colorlight">Success Story</h3>
				</div>
				<section class="cd-horizontal-timeline">
					<div class="timeline">
						<div class="events-wrapper">
							<div class="events">
								<ol style="list-style-type:none">
									@foreach($timeline as $timeitem)
										@if ($loop->first)
											<li>
												<a href="" data-date={{ date('d/m/Y', strtotime($timeitem->show_date)) }} class="selected"> {{ date('M-Y', strtotime($timeitem->show_date)) }}</a>
											</li>
										@else
											<li>
												<a href="" data-date={{ date('d/m/Y', strtotime($timeitem->show_date)) }} > {{ date('M-Y', strtotime($timeitem->show_date)) }}</a>
											</li>
										@endif
									@endforeach
								</ol>
								<span class="filling-line" aria-hidden="true"></span>
							</div>
						</div>
						<ul style="list-style-type:none" class="cd-timeline-navigation">
							<li><a href="" class="prev inactive">Prev</a></li>
							<li><a href="" class="next">Next</a></li>
						</ul>
					</div>
					<div class="events-content">
						<ol style="list-style-type:none">
							@foreach($timeline as $timeitem)
								@if ($loop->first)
									<li class="selected" data-date = {{ date('d/m/Y', strtotime($timeitem->show_date)) }}>
										<div>
											<div>
												<!-- <img src={{ $timeitem->image }} height="200px" width="280px"/> -->
												<img src="{{ URL::asset('assets/images/rentbike.jpg') }}" height="200px" width="200px" />
											</div>
											<div>
												<em>{{ date('M-Y', strtotime($timeitem->show_date)) }}</em>
												<em class="desc">{{ $timeitem->description }}</em>
											</div>
										</div>
									</li>
								@else
									<li data-date = {{ date('d/m/Y', strtotime($timeitem->show_date)) }}>
										<div>
											<div>
												<!-- <img src={{ $timeitem->image }} height="200px" width="280px"/> -->
												<img src="{{ URL::asset('assets/images/rentbike.jpg') }}" height="200px" width="200px" />
											</div>
											<div>
												<em>{{ $timeitem->heading }}</em>
												<em>{{ $timeitem->description }}</em>
											</div>
										</div>
									</li>
								@endif
							@endforeach
						</ol>
					</div>
				</section>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			@foreach ($terms as $term)
				<div class="col-md-12 col-sm-12 ">
				<div class="col-md-12 col-sm-12 colourbanner">
						<h3 class="colorlight">{{$term->title}}</h3>
				</div>
				</div>
				<div class="col-md-12 col-sm-12" id='terms-content'>
				<address class="wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
				{!! $term->content !!}
				</address>
				</div>
			@endforeach
		</div>
	</div>
</section>
@endsection