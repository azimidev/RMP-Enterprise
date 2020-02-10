<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to the task</title>
	<link rel="stylesheet"
	      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	      crossorigin="anonymous">
	<style>
		@import  url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin: 0;
			font-family: 'Lato', sans-serif;
			text-align: center;
			color: #999;
		}

		.header {
			width: 100%;
			left: 0px;
			top: 5%;
			text-align: left;
			border-bottom: 1px #999 solid;
		}

		.student-table {
			width: 100%;
		}

		table.student-table th {
			background-color: #C6C6C6;
			text-align: left;
			color: white;
			padding: 7px 3px;
			font-weight: 700;
			font-size: 18px;
		}

		table.student-table tr.odd {
			text-align: left;
			padding: 5px;
			background-color: #F9F9F9;
		}

		table.student-table td {
			text-align: left;
			padding: 5px;
		}

		a, a:visited {
			text-decoration: none;
			color: #999;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
	<link rel="stylesheet" href="<?php echo e('css/app.css'); ?>">
	<?php echo $__env->yieldPushContent('styles'); ?>
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
			'api_token' => Auth::user()->api_token
		]); ?>
	</script>
</head>
<body>
	<div class="container" id="app">
		<?php echo $__env->yieldContent('content'); ?>
	</div>
	<footer class="footer">
		<div class="container">
			<p class="text-muted">Code Test</p>
		</div>
	</footer>
	<?php echo $__env->yieldPushContent('json'); ?>
	<script src="<?php echo e('js/app.js'); ?>"></script>
	<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
