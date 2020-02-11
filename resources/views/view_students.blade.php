@extends('layout.app')

@section('content')
	<div>
		<img src="/images/logo.png" alt="RMP Logo" title="RMP logo" width="100%">
	</div>
	<form action="{{ route('export.course.attendance') }}" method="post">
		{{ csrf_field() }}
		<input type="submit" class="btn btn-info" value="Export Course Attendance" id="submit"/>
	</form>
	<div class="row" style="margin-bottom: 10px;">
		<div class="col-md-6 col-md-offset-3">
			<form method="GET" style="margin-top: 10px;">
				<input type="search"
				       class="form-control"
				       name="q"
				       placeholder="Search by first name, surname, email, university and hit enter"
				       min="3"
				       value="{{ request('q') }}"
				       autofocus>
			</form>
		</div>
	</div>
	<form action="{{ route('export') }}" method="post" id="student_form">
		{{ csrf_field() }}
		@include('partials._alert')

		<input type="button" class="btn btn-success" value="Select All" id="select_all"/>
		<input type="submit" class="btn btn-primary" value="Export Students" id="submit"/>

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
			var selectAll  = $('#select_all');

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
					selectAll.removeClass('btn-success');
					selectAll.addClass('btn-danger');
				} else {
					selectAll.prop('value', 'Select All');
					selectAll.removeClass('btn-danger');
					selectAll.addClass('btn-success');
				}
			}
		});
	</script>
@endpush

