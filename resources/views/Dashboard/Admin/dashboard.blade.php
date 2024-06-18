@extends('Dashboard.layouts.master')
@section('css')
<link href="{{URL::asset('Dashboard/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
<title>{{trans('Dashboard/main-sidebar_trans.admin_dashboard')}}</title>
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
                            @if(App::getLocale() == "ar")
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> مرحبا    {{Auth::user()->name_ar}} </h2>
                            @else
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Welcome {{Auth::user()->name_en}} </h2>
                            @endif
						</div>
					</div>

				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div style="text-align: center;">
                            <img alt="image" style="width: 100px; height: 100px;"
                                 src="{{$topGoalScorer->photo }}" />
                         </div>
                        <div class="mr-auto">
                            <h2 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;">{{trans('index.top_goal_scorer')}}</h2>
                            @if(App::getLocale() == "ar")
                            <h3 class="tx-13 tx-white-8 mb-3" style="text-align: center;" > {{$topGoalScorer->name_ar}} </h3>
                            @else
                                <h3 class="tx-13 tx-white-8 mb-3" style="text-align: center;" > {{$topGoalScorer->name_en}} </h3>
                            @endif

                            <h3 class="counter mb-0 text-white" style="text-align: center;">{{$topGoalScorer->stat->Goals}} {{trans('index.goal')}} </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div style="text-align: center;">
                            <img alt="image" style="width: 100px; height: 100px;"
                                 src="{{$topAssister->photo }}" />
                         </div>
                        <div class="mr-auto">
                            <h2 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;" > {{trans('index.top_assister')}}    </h2>
                            @if(App::getlocale() == "ar")
                                <h3 class="tx-13 tx-white-8 mb-3" style="text-align: center;"> {{$topAssister->name_ar}} </h3>
                            @else
                                <h3 class="tx-13 tx-white-8 mb-3" style="text-align: center;"> {{$topAssister->name_en}} </h3>
                            @endif

                                <h3 class="counter mb-0 text-white" style="text-align: center;">{{intval($topAssister->stat->Assists*$topAssister->stat->MP)}}
                                    {{trans('index.assist')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon">
                            <i class="icon icon-people"></i>
                        </div>
                        <div class="mr-auto">
                            <h2 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;" >{{trans('index.users')}}</h2>
                                <h1 class="tx-13 tx-white-8 mb-3" style="text-align: center;">
                                </h1>
                            <h3 class="counter mb-0 text-white" style="text-align: center;">
                                {{$count_users}}<br>
                                {{trans('index.user')}}<br>

                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card  bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon">
                            <i class="icon icon-people"></i>
                        </div>
                        <div class="mr-auto">
                            <h2 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;" > {{trans('index.part')}} </h2>
                                <h1 class="tx-13 tx-white-8 mb-3" style="text-align: center;">
                                </h1>
                            <h3 class="counter mb-0 text-white" style="text-align: center;">
                                {{$clubs_count}}<br>
                                {{trans('index.ppartener')}}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">{{trans('index.topScore')}}</h6>
                <div class="list-group">
                    @foreach($topLegScorer as $player)
                        <div class="list-group-item border-top-0 {{$loop->first ? 'bg-primary text-white' : ''}} " style="{{ $loop->first ? 'height: 60px; font-size: 17px ;  ' : '' }}"  >
                            <p>{{$loop->iteration}} # </p>
                            <img  alt="image" class="flag-icon  flag-icon-squared flag-icon-lg"
                                  src="{{$player->photo}}" />
                            @if(App::getlocale() == "ar")
                                <a href="{{route('stats.show', $player->id)}}" {{$loop->first ? 'class=text-white' : ''}}>{{$player->name_ar}}</a>
                                <span {{$loop->first ? 'class=text-white' : ''}}>{{$player->stat->Goals}} </span>
                            @else
                                <a href="{{route('stats.show', $player->id)}}" {{$loop->first ? 'class=text-white' : ''}}>{{$player->name_en}}</a>
                                <span {{$loop->first ? 'class=text-white' : ''}}>{{$player->stat->Goals}}  </span>
                            @endif
                        </div>
                    @endforeach
                </div>
                <hr>

            </div>
        </div>

        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">{{trans('index.topassist')}}</h6>
                <div class="list-group">
                    @foreach($topAssisterLeg as $player)
                        <div class="list-group-item border-top-0 {{$loop->first ? 'bg-primary text-white' : ''}} " style="{{ $loop->first ? 'height: 60px; font-size: 17px ;  ' : '' }}"  >
                            <p>{{$loop->iteration}} # </p>
                            <img  alt="image" class="flag-icon  flag-icon-squared flag-icon-lg"
                                  src="{{$player->photo}}" />
                            @if(App::getlocale() == "ar")
                                <a href="{{route('stats.show', $player->id)}}" {{$loop->first ? 'class=text-white' : ''}}>{{$player->name_ar}}</a>
                                <span {{$loop->first ? 'class=text-white' : ''}}>{{intval($player->stat->Assists*$player->stat->MP)}} </span>
                            @else
                                <a href="{{route('stats.show', $player->id)}}" {{$loop->first ? 'class=text-white' : ''}}>{{$player->name_en}}</a>
                                <span {{$loop->first ? 'class=text-white' : ''}}>{{intval($player->stat->Assists*$player->stat->MP)}}  </span>
                            @endif
                        </div>
                    @endforeach


                </div>
                <hr>

            </div>
        </div>


        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">{{trans('index.topAppear')}}</h6>
                <div class="list-group">
                    @foreach($topAppearancesLeg as $player)
                        <div class="list-group-item border-top-0 {{$loop->first ? 'bg-primary text-white' : ''}} " style="{{ $loop->first ? 'height: 60px; font-size: 17px ;  ' : '' }}"  >
                            <p>{{$loop->iteration}} # </p>
                            <img  alt="image" class="flag-icon  flag-icon-squared flag-icon-lg"
                                  src="{{$player->photo}}" />
                            @if(App::getlocale() == "ar")
                                <a href="{{route('stats.show', $player->id)}}" {{$loop->first ? 'class=text-white' : ''}}>{{$player->name_ar}}</a>
                                <span {{$loop->first ? 'class=text-white' : ''}}>{{$player->stat->MP}} </span>
                            @else
                                <a href="{{route('stats.show', $player->id)}}" {{$loop->first ? 'class=text-white' : ''}}>{{$player->name_en}}</a>
                                <span {{$loop->first ? 'class=text-white' : ''}}>{{$player->stat->MP}}  </span>
                            @endif
                        </div>
                    @endforeach
                </div>
                <hr>

            </div>
        </div>

        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">{{trans('index.topclub')}}</h6>

                <div class="list-group">
                    @foreach($clubs as $club)
                        <div class="list-group-item border-top-0">
                            <img  alt="image" class="flag-icon  flag-icon-squared flag-icon-lg"
                                  src="{{ $club->image }}" />
                            @if(App::getlocale() == "ar")
                                <p>{{$club->name_ar}}</p>

                            @else
                                <p>{{$club->name_en}}</p>

                            @endif

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <!-- row closed -->

        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">{{trans('index.topcountry')}}</h6>

                <div class="ht-200 ht-lg-250">
                    <canvas id="chartDonut"></canvas>
                </div>

            </div>
        </div>
        <!-- row closed -->

        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                 <div class="main-content-label tx-12 mg-b-15">
                   {{trans('index.top_clubs_in_history')}}
                </div>
                <div class="ht-200 ht-lg-250">

                    @foreach($topClubsInHistory as $club)
                        <div class="list-group-item border-top-0">
                            {{$loop->iteration}}
                            <p>{{$club->name}}</p>

                        </div>
                    @endforeach

                </div>

            </div>
        </div>


        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">{{trans('index.recent_players')}}</h6>
                <div class="list-group">
                    @foreach($recentes as $recent)
                        <div class="list-group-item border-top-0">
                            <img  alt="image" class="flag-icon  flag-icon-squared flag-icon-lg"
                                  src="{{ asset($recent->photo) }}" />
                            @if(App::getlocale() == "ar")
                                <p>{{$recent->name_ar}}</p>
                                <span><a href="{{route('club.show', $recent->club->id)}}">{{$recent->club->name_ar}}</a></span>
                            @else
                                <p>{{$recent->name_en}}</p>
                                <span><a href="{{route('club.show', $recent->club->id)}}">{{$recent->club->name_en}}</a></span>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">{{trans('index.standings')}}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th class="wd-lg-10p">{{trans('index.standing')}}</th>
                            <th class="wd-lg-30p">{{trans('index.team_name')}}</th>
                            <th class="wd-lg-10p tx-right">{{trans('index.played')}}</th>
                            <th class="wd-lg-10p tx-right">{{trans('index.won')}}</th>
                            <th class="wd-lg-10p tx-right">{{trans('index.draw')}}</th>
                            <th class="wd-lg-10p tx-right">{{trans('index.lost')}}</th>
                            <th class="wd-lg-10p tx-right">{{trans('index.goal_in')}}</th>
                            <th class="wd-lg-10p tx-right">{{trans('index.goal_out')}}</th>
                            <th class="wd-lg-10p tx-right">{{trans('index.goal_diff')}}</th>
                            <th class="wd-lg-15p tx-right">{{trans('index.points')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tables as $table)

                        <tr>
                            <td class="tx-right tx-medium tx-inverse">{{$loop->iteration}}</td>

                            @if(App::getlocale() == 'ar')
                            <td class="tx-right tx-medium tx-inverse">
                                <img src="{{$table->image}}" class="wd-30 ht-30" alt="img">
                                {{$table->team_ar}}
                            </td>
                            @else
                                <td class="tx-right tx-medium tx-inverse">
                                    <img src="{{ $table->image }}" class="wd-30 ht-30" alt="img" style="float: left; margin-right: 10px;">
                                    {{ $table->team_en }}
                                </td>

                            @endif
                            <td class="tx-right tx-medium tx-inverse">{{$table->mp}}</td>
                            <td class="tx-right tx-medium tx-inverse">{{$table->won}}</td>
                            <td class="tx-right tx-medium tx-inverse">{{$table->draw}}</td>
                            <td class="tx-right tx-medium tx-inverse">{{$table->lose}}</td>
                            <td class="tx-right tx-medium tx-inverse">{{$table->gf}}</td>
                            <td class="tx-right tx-medium tx-inverse">{{$table->ga}}</td>
                            <td class="tx-right tx-medium tx-inverse">{{$table->gd}}</td>
                            <td class="tx-right tx-medium tx-danger tx-bold">{{$table->points}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    </div>
    </div>
    <!-- Container closed -->
@endsection

@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Moment js -->
    <script src="{{URL::asset('Dashboard/plugins/raphael/raphael.min.js')}}"></script>
    <!--Internal  Flot js-->
    <script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
    <script src="{{URL::asset('Dashboard/js/dashboard.sampledata.js')}}"></script>
    <script src="{{URL::asset('Dashboard/js/chart.flot.sampledata.js')}}"></script>
    <!--Internal Apexchart js-->
    <script src="{{URL::asset('Dashboard/js/apexcharts.js')}}"></script>
    <!-- Internal Map -->
    <script src="{{URL::asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{URL::asset('Dashboard/js/modal-popup.js')}}"></script>
    <!--Internal  index js -->
    <script src="{{URL::asset('Dashboard/js/index.js')}}"></script>
    <script src="{{URL::asset('Dashboard/js/jquery.vmap.sampledata.js')}}"></script>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            hours = (hours < 10) ? "0" + hours : hours;
            minutes = (minutes < 10) ? "0" + minutes : minutes;
            seconds = (seconds < 10) ? "0" + seconds : seconds;

            var timeElement = document.getElementById("real-time-clock");
            if (timeElement) {
                timeElement.querySelector("h6").innerHTML = hours + ":" + minutes + ":" + seconds;
            }
        }
        setInterval(updateClock, 1000);
        updateClock();



    </script>
    <script>
        'use strict';

        var topClubs = {!! json_encode($topClubs) !!};
        const labels = [];
        const gf = [];

        if (Array.isArray(topClubs)) {
            topClubs.forEach(function (club) {
                labels.push(club.team_en);
                gf.push(club.gf);
            });
        }

        var datapie = {
            labels: labels,
            datasets: [{
                data: gf,
                backgroundColor: ['#285cf7', '#f10075', '#8500ff', '#7987a1', '#74de00']
            }]
        };

        var optionpie = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false,
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };
        var ctx7 = document.getElementById('chartDonut');
        var myPieChart7 = new Chart(ctx7, {
            type: 'pie',
            data: datapie,
            options: optionpie
        });


    </script>



@endsection



