@extends('layouts.app')

@section('content')

<section style="background: url(assets/images/booking.jpg);background-size: cover;">
<div class="container" style="margin: 7%;">
<div class="jumbotron text-center" style='background: white;'>
  <h1><span style='color: #1ab91f;font-size:200px;'>&#10004;</span></h1>
  <p class="lead">Your request has been registered successfully. You will receive an email with details shortly</p>
  <hr>
  <p>
  </p>
  <p>Your booking PNR is: <b>{{$booking_pnr}}</b></p>
</div>
</div>
</section>
@endsection