@extends('site.layout')

@section('css')
    <link rel="stylesheet" href="{{asset('site/css/players.css')}}" />
@endsection

@section('contact')
    <!-- navbar -->
        <div class="heroContent">
            <div class="head">
                <h1>{{trans('site/index.discover')}}</h1>
                <h3>{{trans('site/index.app_player')}}</h3>
                <p>{{trans('site/index.middle')}} </p>

            </div>
            <div class="data-analytics">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-xl-6 ">
                            <div class="footy">
                                <h1>footy</h1>
                                <h3>prospect x</h3>
                                <p>{{trans('site/index.pp1')}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6  text-end">
                            <div class="group-images">
                                <img src="{{asset('site/images/players/hero.png')}}" alt="">
                            </div>
                        </div>
                    </div><!--row-->
                </div>
            </div>
            <!-- heroContent -->
    </section>
    <!-- hero -->
    <section class="build">
        <div class="container">
            <div class="build-your">
                @if(App::getLocale()=='en')
                    <h1>build your</h1>
                    <h2>football<span>cv</span></h2>
                @else
                    <h1>ابني</h1>
                    <h2>السيرة الذاتية<span>الخاص بك </span></h2>
                @endif
                <p>
                    {{trans('site/index.bb')}}
                </p>
                <hr>
            </div>
        </div>
    </section><!--build-->
    <section class="cards">
        <div class="container">
            @if(App::getLocale()=='ar')
                <div class="row">
                    <div class="col-12 col-md-6 col-xxl-3 bg">
                        <div class="card1">
                            <img src="{{asset('site/images/players/1.jpg')}}">
                            <h1>معلومات</h1>
                            <h2>شخصية عن اللاعب</h2>
                        </div>
                    </div><!--card1-->

                    <div class="col-12 col-md-6 col-xxl-3 bg">
                        <div class="card2">
                            <img src="{{asset('site/images/players/2.jpg')}}">
                            <img class="image2" src="{{asset('site/images/players/3.jpg')}}">
                            <h1>لوحة تحكم </h1>
                            <h2>كاملة للاعب</h2>
                        </div>
                    </div><!--card2-->

                    <div class="col-12 col-md-6 col-xxl-3 bg">
                        <div class="card3">
                            <img src="{{asset('site/images/players/4.jpg')}}">
                            <img class="image2" src="{{asset('site/images/players/5.jpeg')}}">
                            <h1>تطوير</h1>
                            <h2>الأداء</h2>
                        </div>
                    </div><!--card3-->

                    <div class="col-12 col-md-6 col-xxl-3 bg">
                        <div class="card4">
                            <img src="{{asset('site/images/players/6.png')}}">
                            <h1>كروت</h1>
                            <h2>للاعبين</h2>
                        </div>
                    </div><!--card4-->

                </div><!--row-->

            @else
            <div class="row">
                <div class="col-12 col-md-6 col-xxl-3 bg">
                    <div class="card1">
                        <img src="{{asset('site/images/players/1.jpg')}}">
                        <h1>Personal</h1>
                        <h2>Information</h2>
                    </div>
                </div><!--card1-->

                <div class="col-12 col-md-6 col-xxl-3 bg">
                    <div class="card2">
                        <img src="{{asset('site/images/players/2.jpg')}}">
                        <img class="image2" src="{{asset('site/images/players/3.jpg')}}">
                        <h1>Performance</h1>
                        <h2>Dashboard</h2>
                    </div>
                </div><!--card2-->

                <div class="col-12 col-md-6 col-xxl-3 bg">
                    <div class="card3">
                        <img src="{{asset('site/images/players/4.jpg')}}">
                        <img class="image2" src="{{asset('site/images/players/5.jpeg')}}">
                        <h1>Player</h1>
                        <h2>Skills</h2>
                    </div>
                </div><!--card3-->

                <div class="col-12 col-md-6 col-xxl-3 bg">
                    <div class="card4">
                        <img src="{{asset('site/images/players/6.png')}}">
                        <h1>Player</h1>
                        <h2>Cards</h2>
                    </div>
                </div><!--card4-->

            </div><!--row-->
            @endif

        </div>



    </section>

    <section class="footballer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 ">
                    <div class="performance">
                        <h1>{{trans('site/index.perf')}}</h1>
                        <p>{{ trans('site/index.m1') }}</p>
                        <p>{{ trans('site/index.m2') }}</p>
                        <p>{{ trans('site/index.m3') }}</p>
                        <p>{{ trans('site/index.m4') }}</p>
                        <button class="supmit"><a style="color: #fff; text-decoration: none; font-size: 20px;"
                        href="{{route('topRated')}}">{{trans('site/index.discover')}}</a>

                        </button>
                    </div>
                </div>
                <div class="col-xl-6 ">
                    <div class="groups ">
                        <img class="img-fluid" src="{{asset('site/images/players/footboller.png')}}">
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
                        <img class="screen " src="{{asset('site/images/players/discoverPlayer.png')}}" >
                    </div>
                </div>
                <div class="col-xl-6 order-1 order-xl-2 ">
                    <div class="discoverPlayer-content">
                        <h1>{{trans('site/index.discover')}}<span> {{trans('site/index.player')}}</span></h1>
                        <p>{{trans('site/index.mm3')}}</p>
                            <button class="supmit">
                              <a style="color: #fff; text-decoration: none; font-size: 25px;"  href="{{route('discover')}}">{{trans('site/index.discover')}}</a>
                            </button>
                    </div>
                </div>

            </div><!--row-->
        </div>
    </section><!-- discover-player -->
@endsection
