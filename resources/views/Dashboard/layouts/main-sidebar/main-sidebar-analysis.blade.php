
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{url('dashboard/admin')}}">
            <h1 class="text-light">
                FPX
            </h1>
        <a class="desktop-logo logo-dark active" href="{{ url('dashboard/admin') }}">

            <img src="{{URL::asset('Dashboard/img/brand/logo-white.png')}}" style="width: 50px; height: 50px;"  class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('dashboard/admin') }}">

            <img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}"   class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('dashboard/admin') }}">

            <img src="{{URL::asset('Dashboard/img/brand/favicon-white.png')}}"    class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    @if($coach)

                        <img alt="user-img" class="avatar avatar-xl brround"
                             src="{{ asset('uploads/coach_logo/'. $coach->photo) }}">
                    @else
                        <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('Dashboard/img/faces/6.jpg')}}">
                    @endif

                    <span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    @auth
                        @if(App::getlocale() == 'ar')
                            <h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name_ar}}</h4>
                        @else
                            <h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name_en}}</h4>

                        @endif

                        <span class="mb-0 text-muted">{{Auth::user()->email}}</span>
                    @endauth
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{trans('Dashboard/main-header_trans.main')}}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('dashboard/admin') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">{{trans('Dashboard/main-header_trans.Dashboard')}}</span>
                </a></li>
            <li class="side-item side-item-category">{{trans('Dashboard/main-header_trans.General')}}</li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" width="1em" height="1em">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v2h-2zm0 4h2v6h-2z" opacity=".3"/>
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v2h-2zm0 4h2v6h-2z"/>
                        </svg>


                        <span class="side-menu__label">
                            {{trans('index.contact')}}
                        </span>
                        <i class="angle fe fe-chevron-down"></i>
                    </svg>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('coach.chat') }}">{{trans('index.contact_player')}}</a></li>
                </ul>



            </li>


            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" width="1em" height="1em">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-2-11.86V7h4v1.14l-1.45 1.45L13 9.29l3.84 3.85-1.42 1.42L11 11.71l-1.41 1.41L7.86 12l-1.41-1.41 2.86-2.86L11 6.29l1.41 1.41zm2 8.86h-4v-1.14l1.45-1.45L11 14.71l-3.84-3.85 1.42-1.42L13 12.29l1.41-1.41 1.42 1.42 2.86 2.86-1.42 1.42-2.86-2.86z" opacity=".3"/>
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-2-11.86V7h4v1.14l-1.45 1.45L13 9.29l3.84 3.85-1.42 1.42L11 11.71l-1.41 1.41L7.86 12l-1.41-1.41 2.86-2.86L11 6.29l1.41 1.41zm2 8.86h-4v-1.14l1.45-1.45L11 14.71l-3.84-3.85 1.42-1.42L13 12.29l1.41-1.41 1.42 1.42 2.86 2.86-1.42 1.42-2.86-2.86z"/>
                    </svg>


                    <span class="side-menu__label">
                            {{trans('index.settings')}}
                        </span>
                        <i class="angle fe fe-chevron-down"></i>
                    </svg>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('coach.calendar') }}">{{trans('index.settings')}}</a></li>
                </ul>



            </li>









        </ul>
    </div>
</aside>
<!-- main-sidebar -->
