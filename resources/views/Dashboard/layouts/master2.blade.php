<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="">
		<meta name="Author" content="">

		<meta name="Keywords" content=""/>
		@include('Dashboard.layouts.head')
	</head>

	<body class="main-body bg-primary-transparent">
		<div id="global-loader">
			<img src="{{URL::asset('Dashboard/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		@yield('content')

		@include('Dashboard.layouts.footer-scripts')
	</body>
</html>
