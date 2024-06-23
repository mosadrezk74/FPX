
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">

        <div class="main-header-left ">

            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>


        </div>
        <div class="main-header-right">





            <ul class="nav">
                <li class="">
                    <div class="dropdown  nav-itemd-none d-md-flex">
                        <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" data-bs-dismiss="dropdown"
                           aria-expanded="false">
                            @if (App::getLocale() == 'ar')
                                <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
                                        src="{{URL::asset('Dashboard/img/flags/ar.jpg')}}" alt="img"></span>
                                <strong
                                    class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                            @else
                                <span class="avatar country-Flag mr-0 align-self-center bg-transparent">
                                    <img
                                        src="{{URL::asset('Dashboard/img/flags/us_flag.jpg')}}" alt="img"></span>
                                <strong
                                    class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                            @endif
                            <div class="my-auto">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    @if($properties['native'] == "English")
                                        <i class="flag-icon flag-icon-us"></i>
                                    @elseif($properties['native'] == "العربية")
                                        <i class="flag-icon flag-icon-ps"></i>
                                    @endif
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">

                <div class="dropdown main-profile-menu nav nav-item nav-link">

                    @auth
                        <a class="profile-user d-flex" href="#" data-toggle="dropdown" data-bs-dismiss="dropdown">
                            <img alt="Coach Photo" src="{{ Auth::user()->photo }}">
                        </a>
                    @else
                        <a class="profile-user d-flex" href="#" data-toggle="dropdown" data-bs-dismiss="dropdown">
                            <img alt="Default Photo"  src="{{asset('Dashboard/img/profile.jpg')}}">
                        </a>
                    @endauth


                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user">
                                    @auth
                                    <img alt="" src="{{Auth::user()->photo}}" class=""></div>
                                @else
                                    <img alt="" src="{{asset('Dashboard/img/profile.jpg')}}" class=""></div>
                            @endauth

                                <div class="mr-3 my-auto">
                                    @auth
                                        <h6>{{Auth::user()->name_ar}}</h6><span>{{trans('Dashboard/main-header_trans.admin')}} </span>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        @if($coach)
                            <a class="dropdown-item" href="{{ route('coach.edit', $coach->id) }}">
                                @else
                                    <a class="dropdown-item" href="#">
                                @endif

                            <i class="bx bx-user-circle">
                            </i>{{trans('Dashboard/main-header_trans.my_profile')}}</a>

                        @if(Auth('web')->check())
                            <form method="POST" action="{{ route('logout.user') }}">
                                @elseif(Auth('admin')->check())
                                    <form method="POST" action="{{ route('logout.admin') }}">


                                                @elseif(Auth('player')->check())
                                                    <form method="POST" action="{{ route('logout.player') }}">

                                                        @elseif(Auth('coach')->check())
                                                            <form method="POST" action="{{ route('logout.coach') }}">

                                                                @endif
                                                                @csrf
                                                                <a class="dropdown-item" href="#"
                                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();"><i class="bx bx-log-out"></i>{{trans('Dashboard/main-header_trans.logout')}}</a>
                                                            </form>

                    </div>
                </div>

            </div>
        </div>
    </div>






</div>


