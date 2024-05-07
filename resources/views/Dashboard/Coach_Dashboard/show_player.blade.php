@extends('Dashboard.layouts.master')
@php
$rating=[1,1.5,2.5,2,3.5,3,4,4.5,5,5.5,6,6.5,7,7.5,8,9,10,8.5,9.5];
$random_key = array_rand($rating);

$random_number = $rating[$random_key];
@endphp
@section('title')
	{{trans('index.statistics')}}
@stop
@section('page-header')
 	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">{{trans('index.statistics')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{trans('index.veiw_all')}}</span>
			</div>
		</div>
	</div>
@endsection
	@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex flex-column text-center">
                        <div class="position-relative">
                            <img alt="" src="{{$player->photo }}"  width="200px" height="200px" class="brround img-fluid">
                            <img alt="Club Logo" src="{{$player->club->image}}" class="club-logo ml-1" width="30" height="30">
                            <h1 class="card-subtitle mb-2 text-muted align-items-center  text-center " style="padding-left: 15px;">{{$player->name_ar}}</h1>
                             @if($player->position == 0)
                                <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center " style="padding-left: 15px;">
                                    {{trans('index.goalKeeper')}}</h3>
                            @elseif($player->position == 1)
                                <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center " style="padding-left: 15px;">{{trans('index.defender')}}</h3>
                            @elseif($player->position == 2)
                                <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center " style="padding-left: 15px;">{{trans('index.middle')}}</h3>
                            @elseif($player->position == 3)
                                <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center " style="padding-left: 15px;">{{trans('index.forward')}}</h3>
                            @endif
                            <h5 class="card-subtitle mb-2 text-muted align-items-center  " style="padding-left: 15px;">{{$player->stat->MP}}#</h5>
                        </div>
                    </div>
                    <br>
                </div>

                <div class="col-md-8">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <div class="table-responsive hoverable-table">
                                 <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{trans('index.age')}}</th>
                                        <td>{{$player->stat->Age}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{trans('index.weight')}}</th>
                                        <th>{{rand(60,80)}}</th></tr>
                                    <tr>
                                        <th scope="row">{{trans('index.height')}}</th>
                                            <th>{{rand(170,190)}}</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{trans('index.nation')}}</th>
                                        <td>{{$player->nationality}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{trans('index.rating')}}</th>
                                        <th>
                                            <p class="card-text">
                                                @if(rand() > 5)
                                                    <span class="bg-success text-white">{{rand(5,10)}}</span>
                                                @elseif(rand()<5)
                                                    <span class="bg-danger text-white">{{rand(0,4)}}</span>
                                                @endif
                                            </p>
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="follow-table" >
                            <table class="table table-bordered border-primary text-center text-primary bg-light">
                                <thead>
                                <tr>
                                    <th scope="col"><i class="fas fa-balance-scale fa-lg d-sm-none"></i>
                                        <a href="{{ route('compare', $player->id) }}"  >{{trans('index.compare')}}</a>
                                    </th>
                                    <th scope="col"><i class="fas fa-user-plus fa-lg d-sm-none"></i>
                                        <a href="{{ route('players.follow', $player->id) }}"  >{{trans('index.follow')}}</a>
                                    </th>
                                    <th scope="col"><i class="fas fa-print fa-lg d-sm-none"></i>
                                        <a href="{{ route('stats.print', $player->id) }}">{{trans('index.print')}}</a>
                                    </th>

                                </tr>
                                </thead>

                            </table>
                        </div>



                        </div>
                    </div>
                 </div>
            </div>
        </div>


        <div class="col-lg">

                <div class="card">
                    <div class="card-body">

                        <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                            <div class="tab-pane active" id="home">
                                <h4 class="tx-15 text-uppercase mb-3">{{trans('index.b_stats')}}</h4>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                    <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class=" text-white">{{$player->stat->MP}}</h1>
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{trans('index.appearances')}}</h1>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add more cards here with the same structure -->
                                    <div class="col-lg-3 col-md-3">

                                    <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class=" text-white">{{$player->stat->Goals}}</h1>
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{trans('index.goal')}}</h1>

                                            </div>
                                        </div>
                                    </div>




                                    <!-- Add more cards here with the same structure -->
                                    <div class="col-lg-3 col-md-3">
                                        <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class=" text-white">{{ intval($player->stat->Assists * $player->stat->MP) }}</h1>
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{trans('index.assist')}}</h1>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add more cards here with the same structure -->
                                    <div class="col-lg-3 col-md-3">
                                        <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class=" text-white">{{($player->stat->PasTotCmp*10)*3  }}</h1>
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{trans('index.passes')}}</h1>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="card-title mg-b-0">{{trans('index.stats')}}</h4>
                                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table text-md-nowrap text-center" id="example">

                                                        <tr>
                                                            <th style="font-weight: 1000">احصائيات عامه</th>
                                                            <th style="font-weight: 1000">إجمالي</th>
                                                            <th style="font-weight: 1000"> المتوسط</th>
                                                            <th style="font-weight: 1000">نسبه مئويه %</th>
                                                        </tr>

                                                        <tr>
                                                            <th style="font-weight: 1000">عدد المباريات</th>
                                                            <td>{{$player->stat->MP}}</td>
                                                            <td>{{$player->stat->Min}}</td>
                                                            @php
                                                                $totalMatches = 20;
                                                                $percentage = ($player->stat->MP/ $totalMatches) * 100;
                                                            @endphp
                                                            <td>
                                                                @if($percentage >= 85)
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-success" role="progressbar"
                                                                         style="width: {{$percentage}}%" aria-valuenow="25" aria-valuemin="0"
                                                                         aria-valuemax="100">{{round($percentage)}}%</div>
                                                                </div>

                                                            @elseif($percentage >= 75)
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                                         style="width: {{$percentage}}%" aria-valuenow="25" aria-valuemin="0"
                                                                         aria-valuemax="100">{{round($percentage)}}%</div>
                                                                </div>

                                                            @elseif($percentage >= 50)
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-secondary" role="progressbar"
                                                                         style="width: {{$percentage}}%" aria-valuenow="25" aria-valuemin="0"
                                                                         aria-valuemax="100">{{round($percentage)}}%</div>
                                                                </div>

                                                                @elseif($percentage >=25)
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                                         style="width: {{$percentage}}%" aria-valuenow="25" aria-valuemin="0"
                                                                         aria-valuemax="100">{{round($percentage)}}%</div>
                                                                </div>

                                                                @elseif($percentage >=0)

                                                                <div class="progress">
                                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                                         style="width: {{$percentage}}%" aria-valuenow="25" aria-valuemin="0"
                                                                         aria-valuemax="100">{{round($percentage)}}%</div>
                                                                </div>

                                                            @endif
                                                            </td>


                                                        </tr>
                                                        @php
                                                        $totalminutes = $player->stat->Min;
                                                        $totalgoals = $player->stat->Goals;
                                                        $totalassists = $player->stat->Assists;
                                                        $percentage_goals = ( $totalgoals/ $player->stat->MP) * 100;
                                                        $percentage_assists = ( $totalassists/ $player->stat->MP) * 100;
                                                        @endphp

                                                        <tr>
                                                            <th style="font-weight: 1000">{{trans('index.goal')}}</th>
                                                            <td>{{$player->stat->Goals}}</td>
                                                            <td>{{number_format(($totalgoals/$totalminutes)*90 ,2 )}}</td>

                                                            <td>
                                                                @if($percentage_assists > 85)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-success" role="progressbar"
                                                                             style="width: {{$percentage_assists}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_assists)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_goals > 75)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                                             style="width: {{$percentage_goals}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_goals)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_goals > 50)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-secondary" role="progressbar"
                                                                             style="width: {{$percentage_goals}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_goals)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_goals >25)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                                             style="width: {{$percentage_goals}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_goals)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_goals >=0)

                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                                             style="width: {{$percentage_goals}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_goals)}}%</div>
                                                                    </div>

                                                            @endif
                                                            </td>


                                                        </tr>


                                                        <tr>
                                                            <th style="font-weight: 1000">{{trans('index.assist')}}</th>
                                                            <td>{{$player->stat->Assists}}</td>
                                                            <td>{{number_format(($totalassists/$totalminutes)*90 ,2 )}}</td>

                                                            <td>
                                                                @if($percentage_goals >= 85)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-success" role="progressbar"
                                                                             style="width: {{$percentage_assists}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_assists)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_assists >= 75)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                                             style="width: {{$percentage_assists}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_assists)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_assists >= 50)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-secondary" role="progressbar"
                                                                             style="width: {{$percentage_assists}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_assists)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_assists >=25)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                                             style="width: {{$percentage_assists}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_assists)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_assists >=0)

                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                                             style="width: {{$percentage_assists}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_assists)}}%</div>
                                                                    </div>

                                                            @endif
                                                            </td>


                                                        </tr>


                                                        @php
                                                            $MP= $player->stat->MP;
                                                            $percentage_passes = $player->stat->PasTotCmp_per;
                                                        @endphp
                                                        <tr>
                                                            <th style="font-weight: 1000">{{trans('index.passes')}}</th>
                                                            <td>{{$player->stat->PasTotCmp*10}}</td>
                                                            <td>{{$player->stat->PasTotCmp_per}}</td>
                                                            <td title="نسبه عدد التمريرات الصحيحه في 90 دقيقه">
                                                                @if($percentage_passes >= 85)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-success" role="progressbar"
                                                                             style="width: {{$percentage_passes}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_passes)}}%</div>
                                                                    </div>
                                                                @elseif($percentage_passes >= 75)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                                             style="width: {{$percentage_passes}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_passes)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_passes >= 50)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-secondary" role="progressbar"
                                                                             style="width: {{$percentage_passes}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_passes)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_passes >=25)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                                             style="width: {{$percentage_passes}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_passes)}}%</div>
                                                                    </div>
                                                                @elseif($percentage_passes >=0)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                                             style="width: {{$percentage_passes}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_passes)}}%</div>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        @php
                                                            $random= mt_rand(50, 100) / 100;
                                                            $random_xa=mt_rand(50,100)/100;
                                                            $percentage_xg = $player->stat->G_SoT*100;
                                                            $percentage_xa = $random_xa*100;
                                                        @endphp
                                                        <tr>
                                                            <th style="font-weight: 1000">{{trans('index.xg')}}</th>
                                                            <td>{{ $player->stat->SoT }}</td>
                                                            <td style="color: silver" >N/A</td>

                                                            <td title="عدد الأهداف المسجلة من خلال التسديدات الدقيقة على المرمى">
                                                                @if($percentage_xg >= 85)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-success" role="progressbar"
                                                                             style="width: {{$percentage_xg}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_xg)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_xg >= 75)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                                             style="width: {{$percentage_xg}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_xg)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_xg >= 50)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-secondary" role="progressbar"
                                                                             style="width: {{$percentage_xg}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_xg)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_xg >=25)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                                             style="width: {{$percentage_xg}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_xg)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_xg >=0)

                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                                             style="width: {{$percentage_xg}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_xg)}}%</div>
                                                                    </div>

                                                                @endif
                                                            </td>



                                                        </tr>

                                                        <tr>
                                                            <th style="font-weight: 1000">{{trans('index.xa')}}</th>
                                                            <td>{{$player->stat->PasAss}}</td>
                                                            <td style="color: silver" >N/A</td>
                                                            <td title="نسبه عدد التمريرات التي أدت إلى تسجيل هدف">
                                                                @if($percentage_xa >= 85)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-success" role="progressbar"
                                                                             style="width: {{$percentage_xa}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_xa)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_xa >= 75)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                                             style="width: {{$percentage_xa}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_xa)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_xa >= 50)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-secondary" role="progressbar"
                                                                             style="width: {{$percentage_xa}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_xa)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_xa >=25)
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                                             style="width: {{$percentage_xa}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_xa)}}%</div>
                                                                    </div>

                                                                @elseif($percentage_xa >=0)

                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                                             style="width: {{$percentage_xa}}%" aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100">{{round($percentage_xa)}}%</div>
                                                                    </div>

                                                                @endif
                                                            </td>

                                                        </tr>

                                                        @php
                                                        $percentage_card=($player->stat->CrdY*100/$player->stat->MP)*100;
                                                        $percentage_card_red=($player->stat->CrdR*100/$player->stat->MP)*100;
                                                         @endphp
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">



                                    <div class="col-md-12 col-lg-4 col-xl-4">
                                        <div class="card card-dashboard-eight pb-2">
                                            <div class="main-content-label tx-12 mg-b-15">
                                                تقييم أخر 5 مباريات
                                            </div>
                                            <div class="ht-200 ht-lg-250">

                                                @foreach($random_clubs as $rand)
                                                    <div class="list-group-item border-top-0">
                                                        <p>{{$player->name_ar}} vs {{$rand->name_ar}}</p>
                                                        <span><a href="">{{ mt_rand(50, 100) / 10 }}</a></span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4 col-xl-4">
                                        <div class="card card-dashboard-eight pb-2">
                                            <div class="main-content-label tx-12 mg-b-15">
                                               المياريات
                                            </div>
                                            <div class="ht-200 ht-lg-250">
                                                <table class="table" id="example1">
                                                    <tr>
                                                        <th>عدد المباريات</th>
                                                        <th>{{$player->stat->MP}}</th>
                                                    </tr>

                                                    <tr>
                                                        <th>عدد الدقائق</th>
                                                        <th>{{$player->stat->Min}}</th>
                                                    </tr>


                                                    <tr>
                                                        <th>
                                                            <img src="{{asset('Dashboard\y.png')}}" style="width: 10px;height: 15px"  alt="Yellow Card">
                                                            كرت أصفر
                                                        </th>
                                                        <th>{{$player->stat->CrdY*100}}</th>
                                                    </tr>


                                                    <tr>
                                                        <th>
                                                            <img src="{{asset('Dashboard\r.png')}}" style="width: 10px;height: 15px"  alt="Yellow Card">

                                                            كرت أحمر</th>
                                                        <th>{{$player->stat->CrdR}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>التقييم</th>
                                                        <th>
                                                            <p class="card-text">
                                                                @if(rand() > 5)
                                                                    <span class="bg-success text-white">{{rand(5,10)}}</span>
                                                                @elseif(rand()<5)
                                                                    <span class="bg-danger text-white">{{rand(0,4)}}</span>
                                                                @endif
                                                            </p>
                                                        </th>
                                                    </tr>


                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4 col-xl-4">
                                        <div class="card card-dashboard-eight pb-2">
                                            <div class="main-content-label tx-12 mg-b-15">
                                               Season HeatMap
                                            </div>
                                            <div class="ht-200 ht-lg-250">
                                                <div class="list-group-item border-top-0">
                                                    <img
                                                        src="{{URL::asset('Dashboard/heat.png')}}" style="width: 600px; height: 230px;"
                                                    >
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="card card-dashboard-eight pb-4">
                                            <div class="main-content-label tx-12 mg-b-15">
                                                التسديد علي المرمي
                                            </div>
                                            <div class="ht-200 ht-lg-250">
                                                <table class="table" id="example1">
                                                    <tr  title="عدد المحاولات التي قام بها اللاعب للتسديد على المرمى">
                                                        <th>عدد المحاولات علي المرمي </th>
                                                        <th>{{intval($player->stat->Shots*100/3)}}</th>
                                                    </tr>


                                                    <tr title="نسبة التسديدات الدقيقة إلى عدد التسديدات الكلي">
                                                        <th>
                                                            نسبه التسديدات الدقيقة
                                                        </th>
                                                        <th>{{$player->stat->SoT_per}} % </th>
                                                    </tr>

                                                    <tr>
                                                        <th>XG</th>
                                                        <th>{{$player->stat->SoT}}</th>
                                                    </tr>



{{--                                                    <tr title="  نسبه الأهداف المسجلة من التسديدات على المرمى" >--}}
{{--                                                        <th>--}}
{{--                                                              الأهداف المسجلة من التسديد--}}
{{--                                                        </th>--}}
{{--                                                        <th>{{$player->stat->G_Sh}}</th>--}}
{{--                                                    </tr>--}}




                                                    <tr title="متوسط مسافة التسديدات باليردات">
                                                        <th>
                                                            متوسط مسافة التسديدات
                                                        </th>
                                                        <th>{{$player->stat->ShoDist}}</th>
                                                    </tr>

                                                    <tr title="عدد التسديدات من ركلات حرة">
                                                        <th>  الركلات الحرة (المسجلة)</th>
                                                        <th>
                                                            {{$player->stat->ShoFK*100}}
                                                            ({{intval($player->stat->ShoFK)/2}})
                                                        </th>
                                                    </tr>

                                                    <tr title="عدد التسديدات من ركلات الجزاء">
                                                        <th>ضربات الجزاء (المسجلة)</th>
                                                        <th>
                                                            {{$player->stat->Pkatt*100}}
                                                            ({{intval($player->stat->Pkatt*100)}})

                                                        </th>
                                                    </tr>






                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-3 col-xl-6">
                                        <div class="card card-dashboard-eight pb-4">
                                            <div class="main-content-label tx-12 mg-b-15">
                                                التمريرات
                                            </div>
                                            <div class="ht-200 ht-lg-250">
                                                <table class="table" id="example1">
                                                    <tr title="عدد التمريرات الكلية التي نجح في تنفيذها اللاعب">
                                                        <th>التمريرات المكتملة</th>
                                                        <th>{{($player->stat->PasTotCmp*10)*3}}</th>
                                                    </tr>

                                                    <tr title="عدد التمريرات الكلية التي حاول تنفيذها اللاعب">
                                                        <th>عدد المحاولات للتمرير</th>
                                                        <th>{{($player->stat->PasTotAtt*10)*3}}</th>
                                                    </tr>


                                                    <tr title="نسبة نجاح التمريرات الكلية">
                                                        <th>
                                                            نسبة نجاح التمريرات
                                                        </th>
                                                        <th>
                                                            {{$player->stat->PasTotCmp_per}}%
                                                        </th>
                                                    </tr>


                                                    <tr title="عدد التمريرات الناجحة في مناطق التسديد">
                                                        <th>
                                                            عدد التمريرات في الثلث الأخير
                                                        </th>
                                                        <th>{{intval(($player->stat->Pas3rd*20)*3)}}</th>
                                                    </tr>


                                                    <tr title="عدد التمريرات الناجحة في مناطق التسديد">
                                                        <th>
                                                            نسبه نجاح  التمريرات في الثلث الأخير
                                                        </th>
                                                        <th>
                                                            {{($player->stat->PasShoCmp_per)}}%
                                                        </th>
                                                    </tr>


                                                    <tr title="عدد التمريرات التي أدت إلى تسجيل هدف">
                                                        <th> تمريرات أدت إلى تسجيل هدف</th>

                                                        <th>{{intval(($player->stat->PPA*20)*3)}}</th>
                                                    </tr>

                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-3 col-xl-6">
                                        <div class="card card-dashboard-eight pb-5">
                                            <div class="main-content-label tx-12 mg-b-15">
                                                هجوم
                                            </div>
                                            <div class="ht-200 ht-lg-250">
                                                <table class="table" id="example1">
                                                    <tr title="مجموع المحاولات الهجومية ">
                                                        <th>  مجموع المحاولات الهجومية</th>
                                                        <th>{{($player->stat->SCA)}}</th>
                                                    </tr>

                                                    <tr title="عدد المحاولات الهجومية من التمريرات الحية ">
                                                        <th>عدد المحاولات الهجومية من التمريرات الحية</th>
                                                        <th>{{($player->stat->ScaPassLive)}}</th>
                                                    </tr>


                                                    <tr title="عدد المحاولات الهجومية من التمريرات الميتة ">
                                                        <th>عدد المحاولات الهجومية من التمريرات الميتة</th>
                                                        <th>{{($player->stat->ScaPassDead)}}</th>
                                                    </tr>

                                                    <tr title="عدد المحاولات الهجومية من المراوغات ">
                                                        <th>عدد المحاولات الهجومية من المراوغات</th>
                                                        <th>{{($player->stat->ScaDrib)}}</th>
                                                    </tr>



{{--                                                    <tr title="نسبه عدد المرواغات في كل مباراة">--}}
{{--                                                        <th> عدد المرواغات  </th>--}}
{{--                                                        <th>{{($player->stat->Sw)}}</th>--}}
{{--                                                    </tr>--}}

                                                    <tr title="التمريرات العرضية " >
                                                        <th>كرات عرضيه  </th>
                                                        <td>{{ intval($player->stat->Crs*10)*3}}</td>
                                                    </tr>
                                                    <tr title="عدد الإسهامات في الأهداف من المجال الهجومي">
                                                        <th> عدد الأهداف  </th>
                                                        <th>{{intval(($player->stat->Goals))}}</th>
                                                    </tr>



                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-3 col-xl-6">
                                        <div class="card card-dashboard-eight pb-5">
                                            <div class="main-content-label tx-12 mg-b-15">
                                                دفاع
                                            </div>
                                            <div class="ht-200 ht-lg-250">
                                                <table class="table" id="example1">
                                                    <tr title="عدد التدخلات الناجحة ">
                                                        <th>  عدد التدخلات الناجحة</th>
                                                        <th>{{intval($player->stat->Tkl*10)*3}}</th>
                                                    </tr>

                                                    <tr title="عدد التدخلات الناجحة ">
                                                        <th> عدد التدخلات الصحيحة  </th>
                                                        <th>{{intval($player->stat->TklWon*10)*3}}</th>
                                                    </tr>
                                                    <tr title="عدد التدخلات في الثلث الأخير من الملعب ">
                                                        <th> عدد التدخلات في الثلث الأخير من الملعب  </th>
                                                        <th>{{intval($player->stat->TklDef3rd*10)*3}}</th>
                                                    </tr>
                                                    <tr title="عدد التدخلات في منتصف الملعب">
                                                        <th> عدد التدخلات في منتصف الملعب  </th>
                                                        <th>{{intval($player->stat->TklMid3rd*10)*3}}</th>
                                                    </tr>
                                                    <tr title=" عدد التدخلات في ثلث الهجوم">
                                                        <th>  عدد التدخلات في الثلث الهجوم  </th>
                                                        <th>{{intval($player->stat->TklAtt3rd*10)*3}}</th>
                                                    </tr>

                                                    <tr title="نسبة نجاح التدخلات في مواجهة المراوغات">
                                                        <th>  نسبة نجاح التدخلات في مواجهة المراوغات  </th>
                                                        <th>{{intval($player->stat->TklDri_per)}}%</th>
                                                    </tr>
{{--                                                    <tr title="عدد المراوغات التي تم تجاوزها بنجاح من قبل الخصم">--}}
{{--                                                        <th> عدد المراوغات التي تم تجاوزها بنجاح من قبل الخصم  </th>--}}
{{--                                                        <th>{{intval($player->stat->TklDriPast*10)*3}}</th>--}}
{{--                                                    </tr>--}}






                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{--############################################################################--}}
                                    <div class="col-md-12 col-lg-4 col-xl-4">
                                        <div class="card card-dashboard-eight pb-2">
                                            <div class="main-content-label tx-12 mg-b-15">
                                                لمسات للكرة
                                            </div>
                                            <div class="ht-200 ht-lg-250">
                                                <table class="table" id="example1">
                                                    <tr title="عدد لمسات الكرة " >
                                                        <th>لمسات للكرة</th>
                                                        <td>{{ intval($player->stat->Touches*10)*3}}</td>                                                    </tr>

                                                    <tr title="عدد اللمسات داخل منطقة الدفاع" >
                                                        <th>داخل منطقة الدفاع</th>
                                                        <td>{{ intval($player->stat->TouDef3rd*10)*3}}</td>                                                    </tr>


                                                    <tr title="عدد اللمسات في منتصف الملعب" >
                                                        <th> منتصف الملعب</th>
                                                        <td>{{ intval($player->stat->TouMid3rd*10)*3}}</td>
                                                    </tr>


                                                    <tr title="عدد اللمسات في الثلث الهجومي" >
                                                    <th> الثلث الهجومي</th>
                                                        <td>{{ intval($player->stat->TouAtt3rd*10)*3}}</td>
                                                    </tr>
                                                    <tr title="عدد اللمسات داخل منطقة الجزاء" >
                                                    <th>داخل منطقة الجزاء</th>
                                                        <td>{{ intval($player->stat->TouAttPen*10)*3}}</td>
                                                    </tr>


                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4 col-xl-4">
                                        <div class="card card-dashboard-eight pb-2">
                                            <div class="main-content-label tx-12 mg-b-15">
                                                المرواغة
                                            </div>
                                            <div class="ht-200 ht-lg-250">
                                                <table class="table" id="example1">
                                                    <tr title="عدد محاولات المرواغة  " >
                                                        <th>  المرواغات  </th>
                                                        <td>{{ intval($player->stat->ToAtt*10)*3}}</td>                                                    </tr>

                                                    <tr title="عدد المرواغات الناجحة" >
                                                        <th>المرواغات الناجحة</th>
                                                        <td>{{ intval($player->stat->ToSuc*10)*3}}</td>                                                    </tr>


                                                    <tr title="نسبة نجاح المراوغات" >
                                                        <th> نسبة نجاح المراوغات</th>
                                                        <td>{{ ($player->stat->ToSuc_per)}}%</td>
                                                    </tr>


                                                    <tr title="عدد المرات التي تم التدخل فيها بالمراوغة" >
                                                    <th>التدخل عند المرواغة</th>
                                                        <td>{{ intval($player->stat->ToTkl*10)*3}}</td>
                                                    </tr>
                                                    <tr title="نسبه التدخل عند المرواغة" >
                                                    <th>نسبه التدخل عند المرواغة</th>
                                                        <td>{{ intval($player->stat->ToTkl_per)}}%</td>
                                                    </tr>


                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4 col-xl-4">
                                        <div class="card card-dashboard-eight pb-2">
                                            <div class="main-content-label tx-12 mg-b-15">
                                               اللعب - التسلسل - الأخطاء
                                            </div>
                                            <div class="ht-200 ht-lg-250">
                                                <table class="table" id="example1">

                                                    <tr title="عدد الفرص الخطيرة التي تم إنشاؤها" >
                                                    <th>الفرص الخطيرة </th>
                                                        <td>{{ intval($player->stat->CPA*10)*3}}</td>
                                                    </tr>

                                                    <tr title="عدد مرات استرجاع الكرة من الخصم " >
                                                    <th>استرجاعات الكرة </th>
                                                        <td>{{ intval($player->stat->Rec*2) }}</td>
                                                    </tr>


                                                    <tr title="عدد استرجاع الكرة الذي أدى إلى تقدم الفريق " >
                                                        <th>استرجاع أدي الي تقدم الفريق  </th>
                                                        <td>{{ intval($player->stat->RecProg*2) }}</td>
                                                    </tr>

                                                    <tr title="الكرات الضائعة " >
                                                        <th>عدد الكرات الضائعة  </th>
                                                        <td>{{ intval($player->stat->Crs*10)*3}}</td>
                                                    </tr>

                                                    <tr title="عدد المرات التي تم التسلل فيها " >
                                                        <th>التسلسلات  </th>
                                                        <td>{{ intval($player->stat->Off*10)*3}}</td>
                                                    </tr>














                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{--##############################################################################--}}



                                </div>
                            </div>

                         </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- row closed -->

		</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

@endsection
