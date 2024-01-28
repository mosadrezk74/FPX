@extends('Dashboard.layouts.master')

@section('page-header')
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
                        <div>
                            @if(App::getlocale() == 'ar')
                                <p class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> مرحبا  {{Auth::user()->name_ar}} </p>
                            @else
                                <p class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Welcome {{Auth::user()->name_en}} </p>
                            @endif
                        </div>
					</div>

					<div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">{{trans('index.club')}}</label>
							<div class="main-star">
								@if(App::getlocale() == 'ar')
								<a href="{{route('club.show' , $coach->club->id )}}">
								<h6>{{$coach->club->name_ar}}</h6>
								</a>
								@else
									<a href="{{route('club.show' , $coach->club->id )}}">
										<h6>{{$coach->club->name_en}}</h6>
									</a>
								@endif

							</div>
						</div>
						<div>
							<label class="tx-13">{{trans('index.day')}}</label>
							@if(app::getlocale() == 'ar')
							<h6>{{$dayOfWeekArabic}}</h6>
							@else
								<h6>{{$dayOfWeekEnglish}}</h6>
							@endif
						</div>
						<div id="real-time-clock">
							<label class="tx-13">{{trans('index.time')}}</label>
							<h6>{{$time}}</h6>
						</div>

						<div>
							<label class="tx-13">{{trans('index.date')}}</label>
							<h6>{{date('Y-m-d')}}</h6>
						</div>
					</div>

				</div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        @foreach($clubs as $club)
                            @if($club->id == $club_id)

                                <img  alt="image"  style="width: 100px; height: 100px;"
                                      src="{{ asset('uploads/club_logo/'. $club->image) }}" />

                            @endif
                        @endforeach
                        <div class="mr-auto">
                            <h2 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;">{{trans('index.club')}}</h2>
                            @if(App::getlocale('ar'))
                                <h3 class="counter mb-0 text-white" style="text-align: center;">{{$coach->club->name_ar}}</h3>
                            @else
                                <h3 class="counter mb-0 text-white" style="text-align: center;">{{$coach->club->name_en}}</h3>
                            @endif

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
                            <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;">{{trans('index.team_pl')}}</h1>
                             <h2 class="counter mb-0 text-white" style=" text-align: center;">{{$count_p}}</h2>
                             <h2 class="counter mb-0 text-white" style=" text-align: center;">{{trans('index.player')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-warning-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div style="text-align: center;">
                            <img alt="image" style="width: 100px; height: 100px;"
                                 src="{{ asset('uploads/players/'. $topGoalScorer->photo) }}" />
                        </div>
                        <div class="mr-auto">
                            <h2 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;">{{trans('index.top_team_scorer')}}</h2>
                            @if(App::getLocale() == "ar")
                                <h3 class="tx-13 tx-white-8 mb-3" style="text-align: center;" > {{$topGoalScorer->name_ar}} </h3>
                            @else
                                <h3 class="tx-13 tx-white-8 mb-3" style="text-align: center;" > {{$topGoalScorer->name_en}} </h3>
                            @endif

                            <h3 class="counter mb-0 text-white" style="text-align: center;">{{$topGoalScorer->stat->totalGoals}} {{trans('index.goal')}} </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-success-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div style="text-align: center;">
                            <img alt="image" style="width: 100px; height: 100px;"
                                 src="{{ asset('uploads/players/'. $topAssister->photo) }}" />
                        </div>
                        <div class="mr-auto">
                            <h2 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;">{{trans('index.top_team_assist')}}</h2>
                            @if(App::getLocale() == "ar")
                                <h3 class="tx-13 tx-white-8 mb-3" style="text-align: center;" > {{$topAssister->name_ar}} </h3>
                            @else
                                <h3 class="tx-13 tx-white-8 mb-3" style="text-align: center;" > {{$topAssister->name_en}} </h3>
                            @endif

                            <h3 class="counter mb-0 text-white" style="text-align: center;">{{$topAssister->stat->goalAssists}} {{trans('index.assist')}} </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- row closed -->

    <!-- row closed -->
    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">{{trans('index.recent_players')}}</h6>
                <div class="list-group">
                    @foreach($players as $player)
                        <div class="list-group-item border-top-0">
                            <img  alt="image" class="flag-icon  flag-icon-squared flag-icon-lg"
                                  src="{{ asset('uploads/players/'. $player->photo) }}" />
                            @if(App::getlocale() == "ar")
                                <p>{{$player->name_ar}}</p>
                                <span><a href="">{{$player->club->name_ar}}</a></span>
                            @else
                                <p>{{$player->name_en}}</p>
                                <span><a href="">{{$player->club->name_en}}</a></span>
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
                                <td class="tx-right tx-medium tx-inverse">{{$table->lost}}</td>
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

    <div class="p-6 m-20 bg-white rounded shadow">

{{--        {!! $chart->container() !!}--}}
    </div>

    <!-- row -->



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
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}

@endsection
