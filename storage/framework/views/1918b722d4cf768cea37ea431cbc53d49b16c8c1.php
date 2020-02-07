<?php $__env->startSection('content'); ?>
	<form action="/export" method="post" id="student_form">
		<?php echo e(csrf_field()); ?>


		<div class="header">
			<div><img src="/images/logo.png" alt="RMP Logo" title="RMP logo" width="100%"></div>
			<?php if(session('alert')): ?>
				<div class="alert alert-warning">
					<?php echo e(session('alert')); ?>

				</div>
			<?php endif; ?>
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

			$('#select_all').click(function (event) {
				event.preventDefault();
				allChecked = ! allChecked;
				$('.checkbox').prop('checked', allChecked);
				setSelectAllLabel(allChecked);
			});

			$('.checkbox').change(function () {
				if (false == $(this).prop('checked')) {
					allChecked = false;
				}
				if ($('.checkbox:checked').length == $('.checkbox').length) {
					allChecked = true;
				}
				setSelectAllLabel(allChecked);
			});

			function setSelectAllLabel(allChecked) {
				if (allChecked) {
					$('#select_all').prop('value', 'Unselect All');
				} else {
					$('#select_all').prop('value', 'Select All');
				}
			}

		});
	</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>