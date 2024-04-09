@extends('Website.layout')
@section('css')

    <link rel="stylesheet" href="{{asset('Website/css/players.css')}}" />

@endsection
@section('contact')

    <section class="hero">
        <!-- navbar -->
        <div class="heroContent">
            <div class="head">
                <h1>Discover</h1>
                <h3>the player app</h3>
                <p>Middle East’s biggest football social platform </p>

            </div>
            <div class="data-analytics">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-xl-6 ">
                            <div class="footy">
                                <h1>footy</h1>
                                <h3>prospect x</h3>
                                <p>Data analytics is a strategy used by businesses
                                    and industries to gain a competitive edge and be the</p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6  text-end">
                            <div class="group-images">
                                <img src="{{asset('Website/images/players/hero.png')}}" alt="">
                            </div>
                        </div>
                    </div><!--row-->
                </div>
            </div>
            <!-- heroContent -->

        </div>
    </section>
    <!-- hero -->
    <section class="build">
        <div class="container">
            <div class="build-your">
                <h1>build your</h1>
                <h2>football<span>cv</span></h2>
                <p>
                    A brief football portfolio of a player’s performance,
                    playing behavior, previous teams, videos, and information
                    ready to be presented to scouts and clubs.
                </p>
                <hr>
            </div>
        </div>
    </section><!--build-->
    <section class="cards">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-xxl-3 bg">
                    <div class="card1">
                        <img src="{{asset('Website/images/players/1.jpg')}}">
                        <h1>personal</h1>
                        <h2>information</h2>
                    </div>
                </div><!--card1-->

                <div class="col-12 col-md-6 col-xxl-3 bg">
                    <div class="card2">
                        <img src="{{asset('Website/images/players/2.jpg')}}">
                        <img class="image2" src="{{asset('Website/images/players/3.jpg')}}">
                        <h1>performance</h1>
                        <h2>dashboard</h2>
                    </div>
                </div><!--card2-->

                <div class="col-12 col-md-6 col-xxl-3 bg">
                    <div class="card3">
                        <img src="{{asset('Website/images/players/4.jpg')}}">
                        <img class="image2" src="{{asset('Website/images/players/5.jpg')}}">
                        <h1>player</h1>
                        <h2>skills</h2>
                    </div>
                </div><!--card3-->

                <div class="col-12 col-md-6 col-xxl-3 bg">
                    <div class="card4">
                        <img src="{{asset('Website/images/players/6.jpg')}}">
                        <h1>Player</h1>
                        <h2>Cards</h2>
                    </div>
                </div><!--card4-->

            </div><!--row-->
        </div>



    </section>

    <section class="footballer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 ">
                    <div class="performance">
                        <h1>footballer’s performance</h1>
                        <p>Infographics as an essential tool for analysis and understanding</p>
                        <p>Participate in some projects based on the development of young players</p>
                        <p>Working to develop the technical and individual performance of
                            both technical staff and players and helping to develop performance
                            using specific techniques and artificial intelligence. </p>
                        <p> Working to develop the game, which leads to increasing
                            job opportunities, and it is one of the largest industries
                            in the world, with which some industries in the world, some
                            fields, and many job opportunities have developed and
                            flourishedl</p>
                        <button class="supmit">
                            discover more
                        </button>
                    </div>
                </div>
                <div class="col-xl-6 ">
                    <div class="groups ">
                        <img class="img-fluid" src="{{asset('Website/images/players/footboller.png')}}">
                    </div>
                </div>
            </div><!--row-->
        </div>
    </section><!--footballer-->

    <section class="discover-player">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 order-2 order-xl-1 ">
                    <div>
                        <img class="screen " src="{{asset('Website/images/players/discoverPlayer.png')}}" >
                    </div>
                </div>
                <div class="col-xl-6 order-1 order-xl-2 ">
                    <div class="discoverPlayer-content">
                        <h1>discover<span> player</span></h1>
                        <p>Search for talents using our heat map, and our filtration
                            features for position, city, age group, and overall ratings.
                            Select the player and contact them personally for tryouts.</p>
                    </div>
                </div>

            </div><!--row-->
        </div>
    </section><!-- discover-player -->

@endsection
