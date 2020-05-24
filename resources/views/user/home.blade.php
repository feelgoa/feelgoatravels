@extends('layouts.app')

@section('content')
<section id="home" class="slider" data-stellar-background-ratio="0.5">
	<div class="row">
		<div class="owl-carousel owl-theme">
			<div class="item item-first">
				<div class="caption">
					<div class="container">
						<div class="col-md-8 col-sm-12">
								<h3></h3>
								<h1>Tours</h1>
								<a href="#team" class="section-btn btn btn-default smoothScroll">Book Now</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item item-second">
				<div class="caption">
					<div class="container">
						<div class="col-md-8 col-sm-12">
								<h3>Wedding Car</h3>
								<h1></h1>
								<a href="#menu" class="section-btn btn btn-default smoothScroll">Enquire Now</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item item-third">
				<div class="caption">
					<div class="container">
						<div class="col-md-8 col-sm-12">
							<h3>Rooms</h3>
							<h1></h1>
							<!--<a href="#contact" class="section-btn btn btn-default smoothScroll">Reservation</a>-->
						</div>
					</div>
				</div>
			</div>

			<div class="item item-fourth">
				<div class="caption">
					<div class="container">
						<div class="col-md-8 col-sm-12">
							<h3>Vehicle Rentals</h3>
							<h1></h1>
							<a href="#contact" class="section-btn btn btn-default smoothScroll">Reservation</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<br>
				<address class="wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
					<p align="justify" id="home-basic-info">
						<i class="fa fa-quote-left colourquote" aria-hidden="true"></i>
						It began with and idea for serving people. I was selling tickets for various tourists and was providing travel services to my customers. 
						I used to hire tourist buses from my friends. It struck to me one day, why don't I own a bus of my own rather then renting it. Thats what made me go ahead
						and buy my first bus in 2005. I always this dream to give a great feeling to my customers about Goa and all its beautiful heritages. And that is how feelGoa came
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
			<p class="colordark">
				- Eulogio Gomes (Proprietor - feelGoa)
			</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
			<p>
				<i>
				Motto : Once with us, Always with us, A blessing many envy
				</i>
			</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 com-sm-12">
				<p>
					Recently we have also started providing wedding (with driver for rent).
				</p>
			</div>
		</div>
	</div>

	<div class="container" style="display:block;">
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
</section>
@endsection