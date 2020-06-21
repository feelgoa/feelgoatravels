@extends('layouts.app')

@section('content')
<section class="gallery_body" >
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>	
<link rel="stylesheet" href="{{ URL::asset('assets/css/gallery_style.css') }}">
<div id="gallery-div" class="container-fluid">
@foreach ($images as $image)  
  <img src="{{ $image->img_path}}" class="gallery-card img-responsive">
@endforeach
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      </div>
    </div>

  </div>
</div>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/gallery_script.js') }}"></script>
</section>
@endsection