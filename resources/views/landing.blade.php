@extends('layouts.app')

@section('content')
<section class="row">
	<h1>HELLO ! Welcome to your first landing page</h1>

	@foreach($user as $p)
		{{$p->heading}}
	@endforeach
</section>
@endsection