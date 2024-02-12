<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login SIT Admin Panel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link href="{{ asset('img/logos/logo-2.png') }}" rel="icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginassets/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginassets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginassets/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('loginassets/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginassets/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginassets/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('loginassets/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>

    @yield('content')

	
<!--===============================================================================================-->	
	<script src="{{ asset('loginassets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginassets/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('loginassets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginassets/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginassets/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('loginassets/js/main.js')}}"></script>

</body>
</html>