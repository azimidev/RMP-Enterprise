@extends('layout.app')

@section('content')
	<div class="instructions">
		<img src="/images/logo.png" alt="Logo" title="logo" width="100%">
		{!! $content !!}
		<p><a href="{{url('view')}}" title="task">Click here to take on the challenge</a></p>
	</div>
@endsection
