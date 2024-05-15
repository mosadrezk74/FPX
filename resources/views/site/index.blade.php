@extends('site.layout')
@section('contact')
<div class="heroContent ">
    <div class="heroContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-12 bg">
                    <div class="footy">
                        <h1>Footy</h1>
                        <span>Prospect X</span>
                        <p>
                            {{trans('site/index.main')}}
                        </p>
                        <button class="sapmit">{{trans('site/index.more')}}</button>
                    </div>
                </div>

                <div class="col-lg-5 d-none d-lg-block bg">
                    <div class="heroImageContainer">
                        <a href="#"><img src="https://i.ibb.co/DfBLyDS/player.png"
                                         style="width: 50% ; height: 60%"
                                         alt="player"  /></a>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
    </div>
        <!-- heroContent -->
    </section>
    <!-- hero -->
    @if(App::getLocale() == 'ar')

        <section class="join join-ar">
            <div class="join-footy">
                <h1 style="'color:#287d14 " >انضم الينا </h1>
                <p>
            <span>
            أول شركة مصرية لتحليل أداء لاعبي الدوري المصري
            </span>

                </p>
            </div>
        </section>
        <!-- join -->
    @else
        <section class="join join-en">
            <div class="join-footy">
                <h1>join <span>FOOTY PROSPECT X</span></h1>
                <p>
                    Analyzing players data discovering them and developing their skills
                </p>
            </div>
        </section>
    @endif

    <section class="fpxContainer">
        <div class="fpx">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="fpx-model">
                            <h1>FPX</h1>
                            <p>
                                @if(App::getLocale() == 'en')
                                    {{ trans('site/index.FPX') }}
                                @endif
                                <span class="text-white">
                     {{trans('site/index.par1')}}
                  </span
                  >
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <img src="{{asset('site/images/home/fpx/p1.png')}}" alt="#" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--fpx-->

        <div class="want">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div>
                            <img src="{{asset('site/images/home/fpx/p2.png')}}" alt="#"/>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="working">
                            @if(App::getLocale()=='ar')
                                <div dir="rtl">
                                <h1 class="text-right" >{{trans('site/index.pro')}}</h1>
                                    <p class="text-white text-right">
                                        {{trans('site/index.par2')}}
                                    </p>
                                </div>
                            @else
                            <h1>{{trans('site/index.pro')}}</h1>
                                <p class="text-white" >
                                {{trans('site/index.par2')}}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--want-->
    </section>
    <!-- fpxContainer -->

    <section class="statistics">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="contentContainer">
                        <img
                            class="statisticsImage"
                            src="{{asset('site/images/home/statistics/1.png')}}"
                            alt=""
                        />
                        <p class="statisticsNumber">{{$player_count}}</p>
                        <h4 class="statisticsTitle">{{trans('site/index.player')}}</h4>
                    </div>
                    <!-- contentContainer -->
                </div>
                <div class="col-12 col-lg-4">
                    <div class="contentContainer">
                        <img
                            class="statisticsImage"
                            src="{{asset('site/images/home/statistics/2.png')}}"
                            alt=""
                        />
                        <p class="statisticsNumber">{{$clubs_count}}</p>
                        <h4 class="statisticsTitle">{{trans('site/index.club')}}</h4>
                    </div>
                    <!-- contentContainer -->
                </div>
                <div class="col-12 col-lg-4">
                    <div class="contentContainer">
                        <img
                            class="statisticsImage"
                            src="{{asset('site/images/home/statistics/3.png')}}"
                            alt=""
                        />
                        <p class="statisticsNumber">{{intval($clubs_count*0.75)}}</p>
                        <h4 class="statisticsTitle">{{trans('site/index.data')}}</h4>
                    </div>
                    <!-- contentContainer -->
                </div>
            </div>
            <!-- row -->
        </div>

        <!-- container -->
    </section>
    <!-- statistics -->

    <section class="discover">
        <h4 class="discoverHeading">
           {{trans('site/index.f1')}}
            <span>{{trans('site/index.us')}}</span> {{trans('site/index.f2')}}
        </h4>
        <div class="container contentConatiner">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="content">
                        <img src="{{asset('site/images/home/discover/1.png')}}" alt="" />
                        <p>{{trans('site/index.player')}}</p>
                        <a class="discoverBtn" href="#">{{trans('site/index.dis')}}</a>
                    </div>
                    <!-- content -->
                </div>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="content">
                        <img src="{{asset('site/images/home/discover/2.png')}}" alt="" />
                        <p class="w-75 mt-4 m-auto">{{trans('site/index.scout')}}</p>
                        <a class="discoverBtn" href="#">{{trans('site/index.dis')}}</a>
                    </div>
                    <!-- content -->
                </div>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="content">
                        <img src="{{asset('site/images/home/discover/3.png')}}" alt="" />
                        <p>{{trans('site/index.ser')}}</p>
                        <a class="discoverBtn" href="#">{{trans('site/index.dis')}}</a>
                    </div>
                    <!-- content -->
                </div>
                <!-- col-sm-12 col-md-6 col-lg-4 -->
            </div>
            <!-- row -->
        </div>

    </section>
    <!--  discover-->
{{--    <section class="py-3 py-md-5 py-xl-8">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-md-center">--}}
{{--                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">--}}
{{--                    <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Our Partners</h2>--}}
{{--                    <p class="fs-5 text-secondary mb-5 text-center">--}}
{{--                        Our commitment lies in prioritizing our clients above all else,--}}
{{--                        ensuring they receive unparalleled service tailored to their needs.--}}

{{--                    </p>--}}
{{--                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container overflow-hidden">--}}
{{--            <div class="row gy-4">--}}
{{--                @foreach($clubs as $club)--}}
{{--                    <div class="col-6 col-md-4 col-xl-3">--}}
{{--                        <div class="card text-center" style="background-color: transparent; border: none;">--}}
{{--                            <div class="card-body">--}}
{{--                                <img src="{{$club->image}}" title="{{$club->name_en}}"--}}
{{--                                     class="card-img-top" alt="Club Image" style="filter: grayscale(100%); width: 50%; height: 55%;">--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
        </div>


{{--    </section>--}}
@endsection
