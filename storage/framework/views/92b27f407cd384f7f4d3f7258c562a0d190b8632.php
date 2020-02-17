<?php $__env->startSection('content'); ?>
	<div class="instructions">
		<img src="/images/logo.png" alt="Logo" title="logo" width="100%">
		<?php echo $content; ?>

		<p><a href="<?php echo e(url('view')); ?>" title="task">Click here to take on the challenge</a></p>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>