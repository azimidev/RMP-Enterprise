@extends('layout.app')

@section('content')
	<form action="{{ route('export') }}" method="post" id="student_form">
		{{ csrf_field() }}

		<div class="header">
			<div>
				<img src="/images/logo.png" alt="RMP Logo" title="RMP logo" width="100%">
			</div>
			@include('partials._alert')
			<div style='margin: 10px; text-align: left'>
				<input type="button" value="Select All" id="select_all"/>
				<input type="submit" value="Export" id="submit"/>
			</div>
		</div>

		<div style='margin: 10px; text-align: center;'>
			<table class="student-table">
				<tr>
					<th></th>
					<th>Forename</th>
					<th>Surname</th>
					<th>Email</th>
					<th>University</th>
					<th>Course</th>
				</tr>

				@if(count($students) > 0 )
					@foreach($students as $student)
						<tr>
							<td><input type="checkbox" class="checkbox" name="studentId[]" value="{{ $student->id }}"></td>
							<td>{{ $student->firstname }}</td>
							<td>{{ $student->surname }}</td>
							<td>{{ $student->email }}</td>
							<td>{{ isset($student->course->university) ? $student->course->university : 'N/A' }}</td>
							<td>{{ isset($student->course->course_name) ? $student->course->course_name : 'N/A' }}</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="6" style="text-align: center">Oh dear, no data found.</td>
					</tr>
				@endif
			</table>
		</div>
	</form>
@endsection

@push ('scripts')
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>
		$(document).ready(function () {

			var allChecked = false;
			var selectAll = $('#select_all');

			selectAll.click(function (event) {
				event.preventDefault();
				allChecked = ! allChecked;
				$('.checkbox').prop('checked', allChecked);
				setSelectAllLabel(allChecked);
			});

			$('.checkbox').change(function () {
				if (false === $(this).prop('checked')) {
					allChecked = false;
				}
				if ($('.checkbox:checked').length === $('.checkbox').length) {
					allChecked = true;
				}
				setSelectAllLabel(allChecked);
			});

			function setSelectAllLabel(allChecked) {
				if (allChecked) {
					selectAll.prop('value', 'Unselect All');
				} else {
					selectAll.prop('value', 'Select All');
				}
			}

		});
	</script>
@endpush

