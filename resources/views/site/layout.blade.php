<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('validation.language_direction') }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @yield('title')
    </title>

    @yield('css')

    @if (!request()->route()->named('rating'))
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/css/all.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('site/css/style.css') }}" />
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @if(App::getLocale() == 'ar')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @else
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @endif






</head>
<body>
@if (request()->route()->named('index'))
<section class="hero">
@else
        <section>
    @endif
    <div class="navbar">
        <div class="navbar_items">
            <ul class="herozintal_nav">
                <div
                    class="offcanvas offcanvas-start ps-4"
                    tabindex="-1"
                    id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel"
                    style="background: #1e1e1e"
                >
                    <div dir="rtl" class="offcanvas-header justify-content-end">
                        <h5 class="offcanvas-title ms-5" id="offcanvasExampleLabel">
                            <a href="{{route('index')}}">
                                <img src="{{asset('site/images/navbar/menu.png')}}" class="ms-4" alt="" />
                            </a>
                        </h5>
                        <button
                            type="button"
                            class="btn-close text-primary"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="offcanvas-body pe-0">
                        <div class="mt-5">
                            <ul class="vertical_nav">
                                <li>
                                    <a href="{{route('index')}}">{{trans('site/index.home')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('player')}}">{{trans('site/index.players')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('clubs')}}">{{trans('site/index.clubs')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('compare_front')}}">{{trans('site/index.compare')}}</a>
                                </li>

                                <li>
                                    <a href="{{route('rating')}}">{{trans('site/index.rating')}}</a>
                                </li>

                                <hr/>
                                <li>
                                    <a href="{{ url('login') }}">{{ trans('site/index.sign') }}</a>
                                </li>
                                <li>
                                    <a href="{{route('join')}}"> {{trans('site/index.about')}}</a>
                                </li>
                                <hr/>
                                <div class="dropdown">
                                    <button class="dropdown-toggle border-0 bg-transparent text-white verticalOne" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                    </button>
                                    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li>
                                                <a style="font-size: 14px" class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <!-- offcanvas -->
                </div>
                <li>
                    <a
                        data-bs-toggle="offcanvas"
                        href="#offcanvasExample"
                        role="button"
                        aria-controls="offcanvasExample"
                    >
                        <img class="menuImg" src="{{asset('site/images/navbar/menu.png')}}" alt="" />
                    </a>
                </li>
                <li class="verNavLinks">
                    <a href="{{ route('compare_front') }}">{{ trans('site/index.compare') }}</a>
                </li>
                <li class="verNavLinks">
                    <div class="dropdown">
                        <button
                            class="dropdown-toggle border-0 bg-transparent text-white"
                            type="button"
                            id="dropdownMenuButton2"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            {{trans('site/index.discover')}}
                        </button>
                        <ul
                            class="dropdown-menu py-3"
                            aria-labelledby="dropdownMenuButton2"
                            style="background: #2a2a2a"
                        >
                            <li>
                                <a class="dropdown-item" href="{{route('discover')}}"> {{trans('site/index.discover')}} </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('player')}}"> {{trans('site/index.players')}} </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('clubs')}}">{{trans('site/index.clubs')}}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('rating')}}">{{trans('site/index.rating')}}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('scouting')}}">{{trans('site/index.scout')}}</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="logoParentLi">
                    <a href="{{route('index')}}">
                        <img class="logoImg" src="{{asset('site/images/navbar/Slogo.png')}}" alt="" />
                    </a>
                </li>
                <li class="verNavLinks">
                    <div class="dropdown">
                        <button
                            class="dropdown-toggle border-0 bg-transparent text-white"
                            type="button"
                            id="dropdownMenuButton3"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            {{trans('site/index.contact')}}
                        </button>
                        <ul
                            class="dropdown-menu py-3"
                            aria-labelledby="dropdownMenuButton3"
                            style="background: #2a2a2a"
                        >
                            <li><a class="dropdown-item" href="{{route('contact')}}">{{trans('site/index.contact')}} </a></li>
                            <li>
                                <a class="dropdown-item" href="{{route('join')}}">{{trans('site/index.join')}}</a>
                            </li>

                        </ul>
                    </div>
                </li>
{{--                Login --}}
{{--                Login --}}
                <li class="verNavLinks">
                    <div class="dropdown">
                        <button
                            class="dropdown-toggle border-0 bg-transparent text-white"
                            type="button"
                            id="dropdownMenuButton3"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            {{trans('site/index.login')}}
                        </button>
                        <ul
                            class="dropdown-menu py-3"
                            aria-labelledby="dropdownMenuButton3"
                            style="background: #2a2a2a"
                        >
                            <li>
                                @if(Auth::check())
                                    <a class="dropdown-item" href="{{ route('player') }}">
                                    <img src="{{asset('site/images/pro.png')}}" style="width: 20px; height: 20px" alt="dd">
                                        {{ trans('site/index.profile') }}
                                    </a>
                                    @if(Auth('web')->check())
                                        <form method="POST" style="background-color: transparent"   action="{{ route('logout.user') }}">
                                            @csrf
                                            <a class="dropdown-item"  onclick="event.preventDefault(); this.closest('form').submit();">

                                                {{ trans('site/index.log') }}
                                            </a>
                                        </form>
                                    @endif
                                @else
                                    <a class="dropdown-item" href="{{ route('login') }}">{{ trans('site/index.login') }}</a>
                                @endif

                            </li>

                        </ul>
                    </div>
                </li>

                    <li class="searchParentLi">
                    <form onsubmit="e => e.preventDefault()">
                        <label for="search">
                            <i class="fas fa-search text-white"></i>
                        </label>
                        <input
                            type="text"
                            id="search"
                            name="search"
                            placeholder="search"
                        />
                    </form>
                </li>
            </ul>
        </div>
        <!-- navbar_items -->
    </div>
    <!-- navbar -->




    @yield('contact')








    <section class="footer">
        <hr class="hr" />
        <div class="container">
            <div class="row">
                <div class="col-6 col-xl-2">
                    <a class="first" href="{{route('index')}}">
                        <img class="footerLogo" src="{{asset('site/images/footer/logo.png')}}" alt="" />
                    </a>
                </div>
                <div class="col-6 col-xl-5">
                    <div class="second">
                        <h6>{{trans('site/index.logo')}}</h6>
                        <p>
                            @if(App::getLocale()=='ar')
                                <span>FPX</span>
                                إنها قاعدة بيانات تعاونية ويمكن لأي شخص إنشاء البيانات وتحريرها. تحتوي قاعدة البيانات المجتمعية هذه على معلومات حول اللاعبين والأندية والملاعب والمديرين والحكام والدوريات وغيرها من البيانات المتعلقة بعالم كرة القدم

                            @else
                                <span>FPX</span> It is a collaborative database and anyone can
                                create and edit data. This community database contains
                                information about players, clubs, stadiums, managers,
                                leagues and other data related to the world of football
                        </p>
                            @endif
                        <ul class="socialContainer">
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#"><i class="fab fa-instagram"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#"><i class="fab fa-youtube"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#"><i class="fab fa-google"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- socialContainer -->
                    </div>
                    <!-- second -->
                </div>
                <div class="col-6 col-xl-3">
                    <div class="third">
                        <h4>{{trans('site/index.dis')}}</h4>
                        <ul>
                            <li><a href="{{route('index')}}">{{trans('site/index.home')}} </a></li>
                            <li><a href="{{route('player')}}">{{trans('site/index.players')}} </a></li>
                            <li><a href="{{route('discover')}}">{{trans('site/index.scout')}} </a></li>
                            <li><a href="{{route('join')}}">{{trans('site/index.ser')}} </a></li>
                        </ul>
                    </div>
                    <!-- third -->
                </div>
                <div class="col-6 col-xl-2">
                    <div class="fourth">
                        <ul>
                            <li><a href="{{route('join')}}">{{trans('site/index.about')}}</a></li>
                            <li><a href="{{route('contact')}}">{{trans('site/index.contact')}} </a></li>
                            <li><a href="{{route('discover')}}">{{trans('site/index.about')}} </a></li>
                            <li><a href="{{route('scouting')}}">{{trans('site/index.faq')}} </a></li>
                        </ul>
                    </div>
                    <!-- fourth -->
                </div>
            </div>
            <!-- row -->
        </div>
    </section>
    <!-- footer -->

    <!-- navbar -->
    <script src="{{asset('site/js/bootstrap.js')}}"></script>
    <script src="{{asset('site/js/main.js')}}"></script>
    @yield('js')
</body>
</html>
