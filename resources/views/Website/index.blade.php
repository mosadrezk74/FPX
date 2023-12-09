@extends('Website.layout')
@section('content')



<section class="header">

    <img src="{{asset('Website/assets/images/main_screen/n2.png')}}"
         class="arrow2 wow slideInLeft data-wow-duration='1s'" alt="">

    <img src="{{asset('Website/assets/images/main_screen/n3png.png')}}"
         class="arrow wow slideInRight data-wow-duration='1s' " alt="" >



    <div class="container">
        <div class="contain">
            <nav class="navbar navbar-expand-lg wow slideInDown data-wow-duration='1s'">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('Website/assets/images/main_screen/logo.png')}}"
                         width="200px"
                         height="200px"
                         loading="lazy">
                </a>
                <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <img src=""
                         width="25px"
                         height="25px">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 flex-grow-1.5  gap-lg-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                HOME</a>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                PLAYER
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Top Related Players</a></li>
                                <li><a class="dropdown-item" href="#">New Players</a></li>
                                <li><a class="dropdown-item" href="#">Player images</a></li>



                            </ul>
                        </li>


                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                CLUBS
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Clubs</a></li>
                                <li><a class="dropdown-item" href="#">Popular Countries</a></li>

                            </ul>
                        </li>

                        <li class="nav-item">

                            <a class="nav-link active" aria-current="page" href="#">
                                LOGIN
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            </nav>


            <div class="footy">
                <div class="images">
                    <img src="{{asset('Website/assets/images/main_screen/player.png')}}"
                         width=""
                         height="">
                </div>

                <div class="analyzing">
                    <h1>FOOTY</h1>
                    <h2>PROSPECT X</h2>
                    <P>
                        Analyzing players data discovering them and developing their skills
                    </P>
                </div>
            </div>
        </div><!-- contain -->
    </div><!-- container -->

</section>
<div class="linears">
    <div class="linear-one"></div>
    <div class="mixed-line"></div>
</div>

<section class="join">
    <div class="container">
        <div class="contain">
            <div class="wavy-background">
                <h1>join <span>FOOTY PROSPECT X</span></h1>
                <p>Analyzing players data discovering them and developing their skills</p>
                <hr>
            </div>
        </div>
        <div class="fpxs">
            <div class="fpx">
                <h1>Footy prospect X</h1>
                <p>FPX <span>a model for evaluating performance and predicting
                        player rankings based on data available in the public domain of FIFA.</span></p>
            </div>
            <div class="photo-one">
                <img src="{{asset('Website/assets/images/main_screen/p1.png')}}">
            </div>
        </div>
    </div>
    <div class="want">
        <div class="photo-two">
            <img src="{{asset('Website/assets/images/main_screen/p2.png')}}">
        </div>
        <div class="warking">
            <h1>WANT TO GO PRO?</h1>
            <p>
                Working to develop the technical and individual performance of
                both technical staff and players and helping to develop performance
                using specific techniques and artificial intelligence.
            </p>
        </div>
    </div>
</section>



<div class="cards">

    <div class="card-one">
        <img src="{{asset('Website/assets/images/main_screen/Shirt-2.png')}}"
             width="100px"
             height="100px">
        <p>140.861</p>
        <h1>PLAYER</h1>
    </div>

    <div class="card-two">
        <img src="{{asset('Website/assets/images/main_screen/stadium.svg')}}"
             width="100px"
             height="100px">

        <p>140.861</p>
        <h1>CLUBS</h1>
    </div>

    <div class="card-three">
        <img src="{{asset('Website/assets/images/main_screen/Shirt-2.png')}}"
             width="100px"
             height="100px">
        <p>140.861</p>
        <h1>DATA ANALYST</h1>
    </div>

    <div class="card-four">
        <img src="{{asset('Website/assets/images/main_screen/Shirt-2.png')}}"
             width="100px"
             height="100px">
        <p>140.861</p>
        <h1>PLAYER</h1>
    </div>
</div>
<section class="footer">
    <div class="blocks">
        <div class="logo">
            <img src="{{asset('Website/assets/images/main_screen/logo.png')}}"
                 width="200px"
                 height="200px">
            <p>
                FPX It is a collaborative database andanyone can create
                and edit data. This community database contains information
                about players, clubs, stadiums, managers, referees, leagues
                and other data related to the world of football
            </p>
        </div>

        <div class="explor">
            <h1>EXPLORE</h1>
            <h2>HOME</h2>
            <H2>PLAYERS</H2>
            <H2>SCOUT/COACHES</H2>
            <H2>SERVICE/PROVIDERS</H2>
        </div>

        <div class="about">

            <a href="#about">about</a>
            <a href="#contact">contact</a>
            <a href="#join us">join us</a>
            <a href="#faq">faq</a>
        </div>
    </div>
    <div class="icons" style="background-color: #000000; color: #287D14">
        <h3>FOLLOW US ON</h3><a href="#" class="invi"><i class="fab fa-invision"></i></a>
        <a href="#" class="face"><i class="fab fa-facebook"></i></a>
        <a href="#" class="insta"><i class="fab fa-instagram"></i></a>
        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="whats"><i class="fab fa-whatsapp"></i></a>

    </div>
</section>







@endsection
