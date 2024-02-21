<!-- Title -->
<title>@yield('title')</title>
@yield('css')
@if(App::getLocale() == 'ar')
    <link rel="icon" href="{{URL::asset('Dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
    <link href="{{URL::asset('Dashboard/css/icons.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('Dashboard/css-rtl/sidemenu.css')}}">
    <link href="{{URL::asset('Dashboard/css-rtl/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css-rtl/skin-modes.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
@else
    <link rel="icon" href="{{URL::asset('Dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
    <link href="{{URL::asset('Dashboard/css/icons.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('Dashboard/css/sidemenu.css')}}">
    <link href="{{URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/css/skin-modes.css')}}" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
@endif
