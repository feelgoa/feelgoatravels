@extends('layouts.app')
@section('content')
<section style="color: black;font-size: 20px;background-size: cover; background-image: url('../../assets/images/contact-us-4.jpg'); padding: 12px;">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/rental_booking_style.css') }}">
    <div class="container" style="background-color: #0000008c;border-radius: 15px;margin-top:20px;">
        <h2 class="rental_p">Wedding Cars</h2>
        <hr>
        @foreach (array_chunk($wedding_cars_details, 3) as $chunk)
        <div class="row">
            @foreach($chunk as $vehicle)
            <div class="col-sm-4">
                <div class="single-cat-widget">
                    <div class="content relative">
                        <div class="overlay1 overlay1-bg"></div>
                        <a href="{{route('rental_booking_details.show',encrypt_code($vehicle->vehicle_id)) }}">
                            <div class="thumb">
                                <img class="content-image img-fluid d-block mx-auto" src="{{$vehicle->vehicle_img}}"
                                    alt="">
                            </div>
                            <div class="content-details">
                                <h4 class="content-title mx-auto text-uppercase">{{$vehicle->vehicle_name}}</h4>
                                <span></span>
                                <p class="rental_p">{{$vehicle->capacity}}</p>
                                <p class="rental_p" style="display:none;">{{$vehicle->rate}}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        @endforeach
    </div>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/rental_booking_script.js') }}"></script>
</section>
@endsection