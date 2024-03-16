<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FPX</title>
    <link rel="stylesheet" href="{{asset('Website/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('Website/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('Website/css/style.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Website/css/players.css')}}" />

</head>
<body>
<section class="hero">
    <div class="navbar">
        <div class="navbar_items">
            <ul class="herozintal_nav">
                <div class="offcanvas offcanvas-start ps-4"
                     tabindex="-1"
                     id="offcanvasExample"
                     aria-labelledby="offcanvasExampleLabel"
                     style="background: #1e1e1e">
                    <div dir="rtl" class="offcanvas-header justify-content-end">
                        <h5 class="offcanvas-title ms-5" id="offcanvasExampleLabel">
                            <a href="{{route('front.index')}}">
                                <img src="{{asset('Website/images/navbar/Slogo.png')}}" class="ms-4" alt="" />
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
                                    <a href="{{route('front.index')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('front.player')}}">Players</a>
                                </li>
                                <li>
                                    <a href="#">Clubs</a>
                                </li>
                                <li>
                                    <a href="#">Revent Change</a>
                                </li>
                                <hr />
                                <li>
                                    <a href="#">About</a>
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
                                                href="#">English</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                style="font-size: 14px"
                                                class="dropdown-item"
                                                href="#">Arabic</a
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
                        <img class="menuImg" src="{{asset('Website/images/navbar/menu.png')}}" alt="" />
                    </a>
                </li>
                <li class="verNavLinks"><a href="#">REVENT GHANGE</a></li>
                <li class="verNavLinks">
                    <div class="dropdown">
                        <button
                            class="dropdown-toggle border-0 bg-transparent text-white"
                            type="button"
                            id="dropdownMenuButton2"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            DISCOVER
                        </button>
                        <ul
                            class="dropdown-menu py-3"
                            aria-labelledby="dropdownMenuButton2"
                            style="background: #2a2a2a"
                        >
                            <li>
                                <a class="dropdown-item" href="{{route('front.player')}}"> PLAYERS </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">SCOUT \ CLUBS</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="logoParentLi">
                    <a href="{{route('front.index')}}">
                        <img class="logoImg" src="{{asset('Website/images/navbar/Slogo.png')}}" alt="" />
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
                            CONTACT
                        </button>
                        <ul
                            class="dropdown-menu py-3"
                            aria-labelledby="dropdownMenuButton3"
                            style="background: #2a2a2a"
                        >
                            <li><a class="dropdown-item" href="#"> Contact us </a></li>
                            <li>
                                <a class="dropdown-item" href="#">Join us</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Service provider</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="searchParentLi">
                    <form>
                        <label for="search">
                            <i class="fa-solid fa-magnifying-glass text-white"></i></label>
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
                <a class="first" href="{{route('front.index')}}">
                    <img class="footerLogo" src="{{asset('Website/images/footer/logo.png')}}" alt="" />
                </a>
            </div>
            <div class="col-6 col-xl-5">
                <div class="second">
                    <h6>logo</h6>
                    <p>
                        <span>FPX</span> It is a collaborative database andanyone can
                        create and edit data. This community database contains
                        information about players, clubs, stadiums, managers, referees,
                        leagues and other data related to the world of football
                    </p>
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
                    <h4>EXPLORE</h4>
                    <ul>
                        <li><a href="#">Home </a></li>
                        <li><a href="#">Players </a></li>
                        <li><a href="#">SCOUT/COACHES </a></li>
                        <li><a href="#">SERVICE PROVIDERS </a></li>
                    </ul>
                </div>
                <!-- third -->
            </div>
            <div class="col-6 col-xl-2">
                <div class="fourth">
                    <ul>
                        <li><a href="#"> ABOUT US</a></li>
                        <li><a href="#">CONTACT US </a></li>
                        <li><a href="#">JOIN US </a></li>
                        <li><a href="#">FAQ </a></li>
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
<script src="{{asset('Website/js/bootstrap.js')}}"></script>
<script src="{{asset('Website/js/main.js')}}"></script>


</body>
</html>
