<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		@include('Dashboard.layouts.head')
	</head>

	<body class="main-body app sidebar-mini">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('Dashboard/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
        @if (auth('admin')->user())
            {{--//---------------------------------}}
            @include('Dashboard.layouts.main-sidebar.main-sidebar')
            {{--//---------------------------------}}
        @elseif(auth('coach')->user())
            {{--//---------------------------------}}
            @include('Dashboard.layouts.main-sidebar.main-sidebar-coach')
            {{--//---------------------------------}}
        @elseif(auth('club')->user())
            {{--//---------------------------------}}
            @include('Dashboard.layouts.main-sidebar.main-sidebar-club')
            {{--//---------------------------------}}
        @elseif(auth('player')->user())
            {{--//---------------------------------}}
            @include('Dashboard.layouts.main-sidebar.main-sidebar-player')
            {{--//---------------------------------}}
        @endif


        <!-- main-content -->

		<div class="main-content app-content">
            {{--//---------------------------------}}
            {{--//---------------------------------}}
            @if(auth('admin')->user())
                {{--//---------------------------------}}
                @include('Dashboard.layouts.main-header.main-header')
                {{--//---------------------------------}}
            @elseif(auth('coach')->user())
                {{--//---------------------------------}}
            @include('Dashboard.layouts.main-header.main-header-coach')
                {{--//---------------------------------}}
            @elseif(auth('club')->user())
                {{--//---------------------------------}}
            @include('Dashboard.layouts.main-header.main-header-club')
                {{--//---------------------------------}}
            @elseif(auth('player')->user())
                {{--//---------------------------------}}
            @include('Dashboard.layouts.main-header.main-header-player')
                {{--//---------------------------------}}
            @endif
            {{--//---------------------------------}}
            {{--//---------------------------------}}
			<!-- container -->
			<div class="container-fluid">
				@yield('page-header')
				@yield('content')
				@include('Dashboard.layouts.sidebar')
				@include('Dashboard.layouts.models')
            	@include('Dashboard.layouts.footer')
				@include('Dashboard.layouts.footer-scripts')

            </div>
            </div>
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                <script>
                    $(document).ready(function () {
                        $('#club').on('change', function () {
                            var clubId = $(this).val();
                            console.log('Selected Club ID:', clubId);


                            $.ajax({
                                url: '/get-available-shirt-numbers/' + clubId,
                                type: 'GET',
                                success: function (data) {
                                    console.log(data);

                                    $('#shirt').empty();

                                    $.each(data, function (index, value) {
                                        console.log(value);
                                        $('#shirt').append('<option value="' + value + '">' + value + '</option>');
                                    });
                                },
                                error: function (xhr, status, error) {
                                    console.error(xhr.responseText);
                                }
                            });
                        });
                    });
                </script>


    </body>
</html>
