@extends('Dashboard.layouts.master')

@section('title')
{{trans('index.gen_info')}}
@stop

<style>
    td,
    th{
        background-color: white;
    }


     .chart-container {
         width:  50%;
         height: auto;
     }

</style>


@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				@if(App::getlocale() == 'ar')
				<h4 class="content-title mb-0 my-auto">{{trans('index.gen_info')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{$player->club->name_ar}}
				</span>
				@else
					<h4 class="content-title mb-0 my-auto">{{trans('index.gen_info')}}</h4>
					<span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{$player->club->name_en}}
				@endif

			</div>
		</div>
	</div>
@endsection

	@section('content')
		@include('Dashboard.Clubs.messages_alert')



		<div class="row row-sm">
		@foreach($tables as $table)

			<div class="col-lg-3 col-md-6">
				<div class="card  bg-primary">
					<div class="card-body">
						<div class="counter-status d-flex md-mb-0">
							<div class="counter-icon">
								<i class="icon icon-people"></i>
							</div>
							<div class="mr-auto">
								<h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;">
                                    {{trans('index.current_stad')}}</h1>
								<h2 class="counter mb-0 text-white" style=" text-align: center;">{{$table->rank_id}} # </h2>
							</div>
						</div>
					</div>
				</div>
			</div>

		@endforeach

			<div class="col-lg-3 col-md-6">
			<div class="card  bg-primary">
				<div class="card-body">
					<div class="counter-status d-flex md-mb-0">
						<div class="counter-icon">
							<i class="icon icon-people"></i>
						</div>
						<div class="mr-auto">
							<h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;">{{trans('index.staduim')}}</h1>
                            @if(App::getlocale() == 'ar')
							<h5 class="counter mb-0 text-white" style=" text-align: center;">{{$club_st->staduim_ar}}   </h5>
                            @else
                                <h5 class="counter mb-0 text-white" style=" text-align: center;">{{$club_st->staduim_en}}   </h5>
                            @endif

                        </div>
					</div>
				</div>
			</div>
		</div>

			<div class="col-lg-3 col-md-6">
				<div class="card  bg-primary">
					<div class="card-body">
						<div class="counter-status d-flex md-mb-0">
							<div class="counter-icon">
								<i class="icon icon-people"></i>
							</div>
							<div class="mr-auto ">
								<h1 class="tx-13 tx-white-8 mb-3 text-center" style="font-weight: bold; text-align: center;">{{trans('index.date_of_est')}}</h1>
								<h5 class="counter mb-0 text-white text-center " style=" text-align: center;">{{$club_st->date_of_est}}   </h5>
 							</div>
						</div>
					</div>
				</div>
			</div>



            <div class="col-lg-3 col-md-6">
                <div class="card  bg-primary">
                    <div class="card-body">
                        <div class="counter-status d-flex md-mb-0">
                            <div class="counter-icon">
                                <i class="icon icon-people"></i>
                            </div>
                            <div class="mr-auto">
                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;">{{trans('index.random')}}</h1>
								<a href="" class="counter mb-0 text-white" style="text-align: center; color: #fff; transition: color 0.3s;">
                                    @if(App::getLocale() == 'ar')
                                        {{$topPlayer->name_ar}} ({{$topPlayer->MP}})
                                    @else
                                        {{$topPlayer->name_en}} ({{$topPlayer->MP}})
                                    @endif
								</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


				<!-- row -->


					<div class="table-responsive country-table">

                        <h1 class="tx-13 tx-dark-8 mb-3" style="font-weight: bold">{{trans('index.stand_table')}}</h1>
                        <br>

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
 									<th class="wd-lg-15p tx-right">{{trans('index.points')}}</th>
								</tr>
								</thead>
								<tbody>
								@foreach($tables as $table)

									<tr>
										<td class="tx-right tx-medium tx-inverse">{{$table->rank_id}}</td>

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
 										<td class="tx-right tx-medium tx-danger tx-bold">{{$table->points}}</td>
									</tr>
								@endforeach
								</tbody>
							</table>

                        <br>
                        <div class="row row-sm row-deck">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card card-dashboard-eight pb-2">
                                    <h6 class="card-title">{{trans('index.top_team_scorer_all')}}</h6>
                                    <div class="list-group">
                                        @foreach($topGoalScorers as $player)
                                            <div class="list-group-item border-top-0">
                                                <img alt="image" class="flag-icon flag-icon-squared flag-icon-lg"
                                                     src="{{$player->photo}}" />
                                                @if(App::getlocale() == "ar")
                                                    <p>{{$player->name_ar}}</p>
                                                    <span>{{$player->stat->Goals}}   </span>
                                                @else
                                                    <p>{{$player->name_en}}</p>
                                                    <span>{{$player->stat->Goals}}  </span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="card card-dashboard-eight pb-2">
                                    <h6 class="card-title">{{trans('index.top_team_assist_all')}}</h6>
                                    <div class="list-group">
                                        @foreach($topAssisters as $player)
                                            <div class="list-group-item border-top-0">
                                                <img alt="image" class="flag-icon flag-icon-squared flag-icon-lg"
                                                     src="{{$player->photo}}" />
                                                @if(App::getlocale() == "ar")
                                                    <p>{{$player->name_ar}}</p>
                                                    <span>{{ intval( $player->stat->Assists * $player->stat->MP) }}  </span>
                                                @else
                                                    <p>{{$player->name_en}}</p>
                                                    <span>{{ intval( $player->stat->Assists * $player->stat->MP) }}  </span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <h1 class="tx-13 tx-dark-8 mb-3" style="font-weight: bold">{{trans('index.stand_history')}}</h1>

                                <table  class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap ">
                                    <thead>
                                    <tr>
                                        <th class="wd-lg-40p">{{trans('index.team_name')}}</th>
                                        <th class="wd-lg-10p tx-right">{{trans('index.played')}}</th>
                                        <th class="wd-lg-10p tx-right">{{trans('index.won')}}</th>
                                        <th class="wd-lg-10p tx-right">{{trans('index.draw')}}</th>
                                        <th class="wd-lg-10p tx-right">{{trans('index.lost')}}</th>
                                        <th class="wd-lg-10p tx-right">{{trans('index.goal_in')}}</th>
                                        <th class="wd-lg-10p tx-right">{{trans('index.goal_out')}}</th>
                                        <th class="wd-lg-10p tx-right">{{trans('index.goal_out')}}</th>
                                        <th class="wd-lg-32p tx-right">{{trans('index.points')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($club_history as $history)
                                        <tr>


                                            @if(App::getlocale() == 'ar')
                                                <td class="tx-right tx-medium tx-inverse">
                                                    <img src="{{$table->image}}" class="wd-30 ht-30" alt="img">
                                                    {{$history->name}}
                                                </td>
                                            @else
                                                <td class="tx-right tx-medium tx-inverse">
                                                    <img src="{{ $table->image }}" class="wd-30 ht-30" alt="img" style="float: left; margin-right: 10px;">
                                                    {{ $history->name }}
                                                </td>

                                            @endif
                                            <td class="tx-right tx-medium tx-inverse">{{$history->seosin_count}}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{$history->play}}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{$history->win}}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{$history->draw}}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{$history->lost}}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{$history->g_in}}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{$history->g_off}}</td>
                                            <td class="tx-right tx-medium tx-danger tx-bold">{{$history->total_points}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>





                        </div>




                         <br>
                        <br>


					</div>


				</div>
 			</div>
 		</div>
 @endsection
@section('js')

    <!--Internal  Chart.bundle js -->
    <script src="{{asset('Dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Moment js -->
    <script src="{{asset('Dashboard/plugins/raphael/raphael.min.js')}}"></script>
    <!--Internal  Flot js-->
    <script src="{{asset('Dashboard/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('Dashboard/js/dashboard.sampledata.js')}}"></script>
    <script src="{{asset('Dashboard/js/chart.flot.sampledata.js')}}"></script>
    <!--Internal Apexchart js-->
    <script src="{{asset('Dashboard/js/apexcharts.js')}}"></script>
    <!-- Internal Map -->
    <script src="{{asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('Dashboard/js/modal-popup.js')}}"></script>
    <!--Internal  index js -->
    <script src="{{asset('Dashboard/js/index.js')}}"></script>
    <script src="{{asset('Dashboard/js/jquery.vmap.sampledata.js')}}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Chartjs js -->



@endsection
