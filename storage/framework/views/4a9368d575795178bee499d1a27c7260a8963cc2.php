<?php $__env->startSection('content'); ?>
	<div>
		<img src="/images/logo.png" alt="RMP Logo" title="RMP logo" width="100%">
	</div>
	<form action="<?php echo e(route('export.course.attendance')); ?>" method="post">
		<?php echo e(csrf_field()); ?>

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
				       value="<?php echo e(request('q')); ?>"
				       autofocus>
			</form>
		</div>
	</div>
	<form action="<?php echo e(route('export')); ?>" method="post" id="student_form">
		<?php echo e(csrf_field()); ?>

		<?php echo $__env->make('partials._alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<input type="button" class="btn btn-success" value="Select All" id="select_all"/>
		<input type="submit" class="btn btn-primary" value="Export Students" id="submit"/>
		<br><small class="text-primary">Note: click on name and email columns header to sort based on that column.</small>
		<div style='margin: 10px; text-align: center;'>
			<table class="table table-condensed student-table">
				<tr>
					<th></th>
					<th><?php echo sort_column_by('firstname', 'Forename'); ?></th>
					<th><?php echo sort_column_by('surname', 'Surname'); ?></th>
					<th><?php echo sort_column_by('email', 'Email'); ?></th>
					<th>University</th>
					<th>Course</th>
				</tr>

				<?php if(count($students) > 0 ): ?>
					<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><input type="checkbox" class="checkbox" name="studentId[]" value="<?php echo e($student->id); ?>"></td>
							<td><?php echo e($student->firstname); ?></td>
							<td><?php echo e($student->surname); ?></td>
							<td><?php echo e($student->email); ?></td>
							<td><?php echo e(isset($student->course->university) ? $student->course->university : 'N/A'); ?></td>
							<td><?php echo e(isset($student->course->course_name) ? $student->course->course_name : 'N/A'); ?></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
					<tr>
						<td colspan="6" style="text-align: center">Oh dear, no data found.</td>
					</tr>
				<?php endif; ?>
			</table>
		</div>
	</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>