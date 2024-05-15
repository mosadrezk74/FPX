
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
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications</h6>
                                <span
                                    class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All Read</span>
                            </div>
                            <p data-count="0" class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 notif-count">0</p>
                        </div>
                        <div class="main-notification-list Notification-scroll">
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-pink">
                                    <i class="la la-file-alt text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h5 class="notification-label mb-1">New files available</h5>
                                    <div class="notification-subtext">10 hour ago</div>
                                </div>
                                <div class="mr-auto">
                                    <i class="las la-angle-left text-left text-muted"></i>
                                </div>
                            </a>

                        </div>
                        <div class="dropdown-footer">
                            <a href="">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                <!-- الاشعــــــــــــــــــــــــــــارات خلاص   -->
                <!-- الاشعــــــــــــــــــــــــــــارات خلاص   -->
                <!-- الاشعــــــــــــــــــــــــــــارات خلاص   -->

                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href="#" data-toggle="dropdown" data-bs-dismiss="dropdown">
                        <img alt="" src="{{URL::asset('Dashboard/img/user.png')}}">
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user">
                                    <img alt="" src="{{URL::asset('Dashboard/img/user.png')}}" class="">
                                </div>
                                <div class="mr-3 my-auto">
                                    @auth
                                        <h6>{{Auth::user()->name_ar}}</h6><span>{{trans('Dashboard/main-header_trans.admin')}} </span>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user-circle"></i>{{trans('Dashboard/main-header_trans.my_profile')}}
                        </a>

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
                                                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                    <i class="fas fa-sign-out-alt"></i>{{trans('Dashboard/main-header_trans.logout')}}
                                                                </a>
                                                            </form>
                    </div>
                </div>

            </div>
        </div>
    </div>






</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>


<script>
    var notificationsWrapper   = $('.dropdown-notifications');
    var notificationsCountElem = notificationsWrapper.find('p[data-count]');
    var notificationsCount  = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('h5.notification-label');

    Pusher.logToConsole = true;
    var pusher = new Pusher('575a24b342b94c92fd1d', {
        cluster: 'mt1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('App\\Events\\MyEvent', function(data) {
        var existingNotifications = notifications.html();
        var newNotificationHtml = `<h5 class="notification-label mb-1">`+data.name_ar+`</h5>`;
        notifications.html(newNotificationHtml + existingNotifications);
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
    }); notificationsWrapper.show();

</script>
