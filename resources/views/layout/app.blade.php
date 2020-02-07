<!doctype html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Welcome to the task</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

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

	<link rel="stylesheet" href="{{ 'css/app.css' }}">

	@stack('styles')

	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
			'api_token' => Auth::user()->api_token
		]); ?>
	</script>

</head>

<body>

	<div class="container" id="app">
		@yield('content')
	</div>

	<footer class="footer">
		<div class="container">
			<p class="text-muted">Code Test</p>
		</div>
	</footer>

	@stack('json')

	<script src="{{ 'js/app.js' }}"></script>

	@stack('scripts')

</body>
</html>
