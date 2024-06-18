<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('validation.language_direction') }}">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="..." />
    <meta name="author" content="..." />
    <meta name="keyword" content="..." />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>
        {{trans('site/index.contact')}}
    </title>
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css.map')}}" />
    <link rel="stylesheet" href="{{asset('site/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/css/contactus.css')}}" />
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
</head>
<body>
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
                                <a href="#">{{trans('site/index.clubs')}}</a>
                            </li>
                            <li>
                                <a href="{{route('comparison')}}">{{trans('site/index.compare')}}</a>
                            </li>
                            <hr/>
                            <li>
                                <a href="{{route('login')}}"> {{trans('site/index.sign')}}</a>
                            </li>
                            <li>
                                <a href="{{route('join')}}"> {{trans('site/index.about')}}</a>
                            </li>
                            <hr/>
                            <div class="dropdown">
                                <button
                                    class="dropdown-toggle border-0 bg-transparent text-white verticalOne"
                                    type="button"
                                    id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    English
                                </button>
                                <ul
                                    class="dropdown-menu bg-dark"
                                    aria-labelledby="dropdownMenuButton1"
                                >
                                    <li>
                                        <a
                                            style="font-size: 14px"
                                            class="dropdown-item"
                                            href="#"
                                        >English</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            style="font-size: 14px"
                                            class="dropdown-item"
                                            href="#"
                                        >Arabic</a
                                        >
                                    </li>
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
            <li class="verNavLinks"><a href="{{route('player')}}">{{trans('site/index.compare')}}</a></li>
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
                            <a class="dropdown-item" href="{{route('player')}}"> {{trans('site/index.players')}} </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('player')}}">{{trans('site/index.clubs')}}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('rating')}}">{{trans('site/index.rating')}}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="logoParentLi">
                <a href="{{route('player')}}">
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
                        <i class="fa-solid fa-magnifying-glass text-white"></i
                        ></label>
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
</div><!-- navbar -->
<section class="contact">
    <h1>{{trans('site/index.contact')}}</h1>
    <p>
        {{trans('site/index.contact_text')}}
    </p>
</section>
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="send-us">
                    <p>{{trans('site/index.contact_text')}}</p>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="contactForm" action="{{route('contact.store')}}"  method="post">
                        @csrf
                        <input
                            type="text"
                            name="f_name"
                            placeholder="{{trans('site/index.f_name')}}"
                            required

                        />
                        <input
                            type="text"
                            name="l_name"
                            placeholder="{{trans('site/index.l_name')}}"
                            required

                        />
                        <input
                            type="number"
                            name="number"
                            placeholder="{{trans('site/index.phone')}}"
                            required

                        />
                        <input
                            type="email"
                            name="email"
                            placeholder="{{trans('site/index.email')}}"
                            required

                        />
                        <textarea
                            rows="5"
                            name="message"
                            placeholder="{{trans('site/index.message')}}"
                            required


                        ></textarea>
                        <div class="we-contact">
                            <h3 class="mt-2">{{trans('site/index.we_contact')}}</h3>
                            <div>
                                <input type="checkbox" name="contact_method[]" id="email" value="email">
                                <label for="email">{{trans('site/index.email')}}</label>
                            </div>
                            <div>
                                <input type="checkbox" name="contact_method[]" id="phone" value="phone">
                                <label for="phone">{{trans('site/index.phone')}}</label>
                            </div>
                        </div>

                        <input type="submit" >
                    </form>
                </div>
            </div>
            <div class="col-12 col-xl-6 mt-5 mt-xl-0">
                <div class="get">
                    <h1>{{trans('site/index.get')}}</h1>
                    <p>
                        {{trans('site/index.our')}}
                    </p>
                    <div class="icons">
                        <i class="fa-solid fa-location-dot">{{trans('site/index.address')}}</i>
                        <i class="fa-solid fa-phone">+(20) 1090043391 </i>
                        <i class="fa-solid fa-envelope">fpx_Team@fpx.com</i>
                    </div>
                </div>
            </div>
        </div>
        <!--row-->
    </div>
</section>

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
                            <span>FPX</span> It is a collaborative database andanyone can
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
                        <li><a href="{{route('join')}}">{{trans('site/index.faq')}} </a></li>
                    </ul>
                </div>
                <!-- fourth -->
            </div>
        </div>
        <!-- row -->
    </div>
</section>


<script src="{{asset('site/js/bootstrap.js')}}"></script>
<script src="{{asset('site/js/main.js')}}"></script>
</body>
</html>
