@extends('layouts.app')

@section('content')
<section>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/booking_style.css') }}">
    <div class="" style="padding: 0px 12px 0px 12px;">
        <div class="row"
            style="color: black;font-size: 20px;background-size: cover; background-image: url('../../assets/images/booking1.jpg'); padding: 12px;">
            <div class="col-md-4">
            </div>
            <div class="container">
                <div class="row">
                    <div class="text-center col-md-6"
                        style="background-color: #0000008c; border-radius: 15px; padding:12px;">
                        <h1><span style='color: #1ab91f;font-size:100px;margin-top: 50px;'>&#10004;</span></h1>
                        <p class="pfont">Your booking request has been successfully registered. You will receive a
                            response from the
                            Feel Goa team with details on availablity and the payments.</p>
                        <p>
                        </p>
                        <p class="pfont">Here is your booking PNR number : <b>{{$booking_pnr}} .</b> You will also
                            recieve an email
                            with these details.</p>
                        <p class="pfont">You can use this PNR number to track the status of your request by clicking on
                            <b>"Booking
                                status enquiry"</b> at the bottom of the page.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection