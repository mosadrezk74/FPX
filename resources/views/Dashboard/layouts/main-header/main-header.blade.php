<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . $page='index') }}" ><img src="{{URL::asset('Dashboard/img/brand/logo.png')}}"
                                                              class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/logo-white.png')}}"
                                                              class="dark-logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}"
                                                              class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}"
                                                              class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>

        </div>
        <div class="main-header-right">
            <div class="theme-switch-wrapper">
                <label class="theme-switch" for="theme-switch" style=" display: none;" >
                    <input type="checkbox" id="theme-switch"  />
                    <span class="slider"></span>
                </label>
                <div class="theme-switcher-options">
                    <button class="btn btn-sm btn-light" id="light-theme">
                        <i class="fas fa-sun fa-2x-lg"></i>
                    </button>
                    <button class="btn btn-sm btn-dark" id="dark-theme">
                        <i class="fas fa-moon fa-2x-lg"></i>
                    </button>
                </div>

            </div>
            <ul class="nav">
                <li class="">
                    <div class="dropdown  nav-itemd-none d-md-flex">
                        <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" data-bs-dismiss="dropdown"
                           aria-expanded="false">
                            @if (App::getLocale() == 'ar')
                                <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
                                        src="{{URL::asset('Dashboard/img/flags/egypt_flag.jpg')}}" alt="img"></span>
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
                                        <i class="flag-icon flag-icon-eg"></i>
                                    @endif
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                        </svg>
                    </a>
                </div>

                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#" data-toggle="dropdown" data-bs-dismiss="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        <span class=" pulse"></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">{{trans('Dashboard/main-header_trans.notifications')}}</h6>
                                <span
                                    class="badge badge-pill badge-warning mr-auto my-auto float-left">{{trans('Dashboard/main-header_trans.all')}}</span>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">{{trans('Dashboard/main-header_trans.you_have')}} 4
                                {{trans('Dashboard/main-header_trans.notifications')}}</p>
                        </div>
                        <div class="main-notification-list Notification-scroll">
                            <a class="d-flex p-3 border-bottom" href="#" data-toggle="dropdown" data-bs-dismiss="dropdown">
                                <div class="notifyimg bg-pink">
                                    <i class="la la-file-alt text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h5 class="notification-label mb-1">{{trans('Dashboard/main-header_trans.new_files')}}</h5>
                                    <div class="notification-subtext">10 {{trans('Dashboard/main-header_trans.hours_ago')}}</div>
                                </div>
                                <div class="mr-auto">
                                    <i class="las la-angle-left text-left text-muted"></i>
                                </div>
                            </a>
                            <a class="d-flex p-3" href="#" data-toggle="dropdown" data-bs-dismiss="dropdown">
                                <div class="notifyimg bg-purple">
                                    <i class="la la-gem text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h5 class="notification-label mb-1">{{trans('Dashboard/main-header_trans.updates')}}</h5>
                                    <div class="notification-subtext">2 {{trans('Dashboard/main-header_trans.days_ago')}}</div>
                                </div>
                                <div class="mr-auto">
                                    <i class="las la-angle-left text-left text-muted"></i>
                                </div>
                            </a>

                        </div>
                        <div class="dropdown-footer">
                            <a href="">{{trans('Dashboard/main-header_trans.view')}}</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href="" data-toggle="dropdown" data-bs-dismiss="dropdown"><img alt=""
                                                                src="{{URL::asset('Dashboard/img/faces/6.jpg')}}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt="" src="{{URL::asset('Dashboard/img/faces/6.jpg')}}"
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



<script>
    const themeSwitch = document.getElementById('theme-switch');
    const lightThemeButton = document.getElementById('light-theme');
    const darkThemeButton = document.getElementById('dark-theme');
    document.body.classList.add('dark-theme');
    themeSwitch.addEventListener('change', () => {
        if (themeSwitch.checked) {
            document.body.classList.add('dark-theme');
            localStorage.setItem('theme', 'dark');
        } else {
            document.body.classList.remove('dark-theme');
            localStorage.setItem('theme', 'light');
        }
    });
    lightThemeButton.addEventListener('click', () => {
        themeSwitch.checked = false;
        document.body.classList.remove('dark-theme');
    });
    darkThemeButton.addEventListener('click', () => {
        themeSwitch.checked = true;
        document.body.classList.add('dark-theme');
    });
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme === 'dark') {
        themeSwitch.checked = true;
    } else if (storedTheme === 'light') {
        themeSwitch.checked = false;
        document.body.classList.remove('dark-theme');
    }
</script>
