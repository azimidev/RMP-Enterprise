<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" href="<?php echo e('plugins/sweet-alert/sweetalert.css'); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

	<students></students>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('json'); ?>
	<script type="text/javascript">
		var students = <?php echo $students->toJson(); ?>;
	</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e('plugins/sweet-alert/sweetalert.min.js'); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>