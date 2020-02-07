@extends('layout.app')

@push('styles')
	<link rel="stylesheet" href="{{ 'plugins/sweet-alert/sweetalert.css' }}">
@endpush

@section('content')
	<students></students>
@endsection

@push('json')
	<script type="text/javascript">
		var students = {!! $students->toJson() !!};
	</script>
@endpush

@push('scripts')
	<script src="{{ 'plugins/sweet-alert/sweetalert.min.js' }}"></script>
@endpush
