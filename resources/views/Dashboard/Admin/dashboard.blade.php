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
            <div class="card  bg-warning-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div style="text-align: center;">
                            <img alt="image" style="width: 100px; height: 100px;"
                                 src="{{ asset('uploads/players/'. $topGoalScorer->photo) }}" />
                         </div>
                        <div class="mr-auto">
                            <h2 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;">{{trans('index.top_goal_scorer')}}</h2>
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
            <div class="card  bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div style="text-align: center;">
                            <img alt="image" style="width: 100px; height: 100px;"
                                 src="{{ asset('uploads/players/'. $topAssister->photo) }}" />
                         </div>
                        <div class="mr-auto">
                            <h2 class="tx-13 tx-white-8 mb-3" style="font-weight: bold; text-align: center;" > {{trans('index.top_assister')}} </h2>
                            @if(App::getlocale() == "ar")
                                <h3 class="tx-13 tx-white-8 mb-3" style="text-align: center;"> {{$topAssister->name_ar}} </h3>
                            @else
                                <h3 class="tx-13 tx-white-8 mb-3" style="text-align: center;"> {{$topAssister->name_en}} </h3>
                            @endif

                                <h3 class="counter mb-0 text-white" style="text-align: center;">{{$topAssister->stat->goalAssists}}
                                    {{trans('index.assist')}}</h3>
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
                <h6 class="card-title">{{trans('index.recent_players')}}</h6>
                 <div class="list-group">
                    @foreach($recentes as $recent)
                        <div class="list-group-item border-top-0">
                            <img  alt="image" class="flag-icon  flag-icon-squared flag-icon-lg"
                                  src="{{ asset('uploads/players/'. $recent->photo) }}" />
                            @if(App::getlocale() == "ar")
                                <p>{{$recent->name_ar}}</p>
                                <span><a href="">{{$recent->club->name_ar}}</a></span>
                            @else
                                <p>{{$recent->name_en}}</p>
                                <span><a href="">{{$recent->club->name_en}}</a></span>
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

    <!-- row -->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Line Chart
                    </div>
                    <p class="mg-b-20">Basic Charts Of Valex template.</p>
                    <div class="chartjs-wrapper-demo">
                        <canvas id="chartLine1"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-sm-12 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Area Chart
                    </div>
                    <p class="mg-b-20">Basic Charts Of Valex template.</p>
                    <div class="chartjs-wrapper-demo">
                        <canvas id="chartArea1"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
    </div>
    <!-- /row -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Stacked Bar Chart
                    </div>
                    <p class="mg-b-20">Basic Charts Of Valex template.</p>
                    <div class="chartjs-wrapper-demo">
                        <canvas id="chartStacked1"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-sm-12 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Stacked Bar Chart
                    </div>
                    <p class="mg-b-20">Basic Charts Of Valex template.</p>
                    <div class="chartjs-wrapper-demo">
                        <canvas id="chartStacked2"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
    </div>
    <!-- /row -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="main-content-label tx-12 mg-b-15">
                                Solid Color
                            </div>
                            <div class="ht-200 ht-lg-250">
                                <canvas id="chartBar1"></canvas>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-sm-12 col-md-6 col-xl-4 mg-t-20 mg-md-t-0">
                            <div class="main-content-label tx-12 mg-b-15">
                                With Transparency
                            </div>
                            <div class="ht-200 ht-lg-250">
                                <canvas id="chartBar2"></canvas>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-sm-12 col-md-6 col-xl-4 mg-t-20 mg-xl-t-0">
                            <div class="main-content-label tx-12 mg-b-15">
                                Using Gradient Color
                            </div>
                            <div class="ht-200 ht-lg-250">
                                <canvas id="chartBar3"></canvas>
                            </div>
                        </div><!-- col-6 -->
                    </div>
                </div><!-- col-12 -->
            </div><!-- col-12 -->
        </div><!-- col-12 -->
    </div>
    <!-- /row -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Horizontal Bar Chart
                    </div>
                    <p class="mg-b-20">Basic Charts Of Valex template.</p>
                    <div class="chartjs-wrapper-demo">
                        <canvas id="chartBar4"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-sm-12 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Horizontal Bar Chart
                    </div>
                    <p class="mg-b-20">Basic Charts Of Valex template.</p>
                    <div class="chartjs-wrapper-demo">
                        <canvas id="chartBar5"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
    </div>
    <!-- /row -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-6">
            <div class="card mg-b-md-20 overflow-hidden">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Pie Chart
                    </div>
                    <p class="mg-b-20">Basic Charts Of Valex template.</p>
                    <div class="chartjs-wrapper-demo">
                        <canvas id="chartPie"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-sm-12 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Donut Chart
                    </div>
                    <p class="mg-b-20">Basic Charts Of Valex template.</p>
                    <div class="chartjs-wrapper-demo">
                        <canvas id="chartDonut"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
    </div>


    </div>
    </div>
    <!-- Container closed -->
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
    <script src="{{URL::asset('js/chart.chartjs.js')}}"></script>


@endsection


