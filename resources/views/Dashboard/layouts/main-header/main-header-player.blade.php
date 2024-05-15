
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

                <!-- الاشعــــــــــــــــــــــــــــارات هنا   -->
                <!-- الاشعــــــــــــــــــــــــــــارات هنا   -->
                <!-- الاشعــــــــــــــــــــــــــــارات هنا   -->

                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#">
                        <i class="fas fa-bell header-icon-svgs"></i>
                        <span class="pulse"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">{{trans('Dashboard/main-header_trans.notifications')}}</h6>
                                <span class="badge badge-pill badge-warning mr-auto my-auto float-left">{{trans('Dashboard/main-header_trans.all')}}</span>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">{{trans('Dashboard/main-header_trans.you_have')}} {{ $notifications->count() }} {{trans('Dashboard/main-header_trans.notifications')}}</p>
                        </div>
                        <div class="main-notification-list Notification-scroll">
                            @forelse($notifications as $notification)
                                <a class="d-flex p-3 border-bottom" href="{{ json_decode($notification->data)->id }}" data-toggle="dropdown" data-bs-dismiss="dropdown">
                                    <div class="notifyimg bg-pink">
                                        <i class="la la-file-alt text-white"></i>
                                    </div>
                                    <div class="mr-3">
                                        <h5 class="notification-label mb-1">{{ json_decode($notification->data)->title }}</h5>
                                        <div class="notification-subtext">{{ $notification->created_at->diffForHumans() }}</div>
                                    </div>
                                    <div class="mr-auto">
                                        <i class="las la-angle-left text-left text-muted"></i>
                                    </div>
                                </a>
                            @empty
                                 <div class="p-3 text-center">{{trans('Dashboard/main-header_trans.no_notifications')}}</div>
                            @endforelse
                        </div>
                        <div class="dropdown-footer">
                            <a href="{{ url('InvoicesDetails') }}">{{trans('Dashboard/main-header_trans.view')}}</a>
                        </div>
                    </div>
                </div>

                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href="" data-toggle="dropdown" data-bs-dismiss="dropdown"><img alt="" src="{{$player->photo}}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt="" src="{{$player->photo}}"
                                                                class=""></div>
                                <div class="mr-3 my-auto">
                                    @auth
                                        <h6>{{Auth::user()->name_ar}}</h6><span>{{trans('Dashboard/main-header_trans.admin')}} </span>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href=><i class="bx bx-user-circle"></i>{{trans('Dashboard/main-header_trans.my_profile')}}</a>

                        @if(Auth('web')->check())
                            <form method="POST" action="{{ route('logout.user') }}">
                                @elseif(Auth('admin')->check())
                                    <form method="POST" action="{{ route('logout.admin') }}">

                                        @elseif(Auth('club')->check())
                                            <form method="POST" action="{{ route('logout.club') }}">

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


