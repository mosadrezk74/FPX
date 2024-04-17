<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{URL::asset('Dashboard/my-css/style.css')}}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



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




</body>
</html>
