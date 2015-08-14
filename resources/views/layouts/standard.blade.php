<html>
	<head>
		<title>{{ isset($title) ? 'Grocer: '.$title : 'Grocer' }}</title>

		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		@yield('head')
	</head>
	<body>

		<div class="container">
			@yield('body')
		</div>

	</body>
</html>