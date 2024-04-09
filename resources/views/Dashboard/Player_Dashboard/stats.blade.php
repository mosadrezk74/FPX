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
                        <img alt="" src="{{ asset('uploads/players/'. $player->photo) }}"  width="200px" height="200px" class="brround img-fluid">
                        <img alt="Club Logo" src="{{$player->club->image}}" class="club-logo ml-1" width="30" height="30">
                        <h1 class="card-subtitle mb-2 text-muted align-items-center  text-center " style="padding-left: 15px;">{{$player->name_ar}}</h1>
                        @if($player->position == 0)
                            <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center " style="padding-left: 15px;">حارس المرمي</h3>
                        @elseif($player->position == 1)
                            <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center " style="padding-left: 15px;">مدافع</h3>
                        @elseif($player->position == 2)
                            <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center " style="padding-left: 15px;">وسط ملعب</h3>
                        @elseif($player->position == 3)
                            <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center " style="padding-left: 15px;">مهاجم</h3>
                        @endif
                        <h5 class="card-subtitle mb-2 text-muted align-items-center  " style="padding-left: 15px;">{{$player->stat->Jersey}}#</h5>
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
                                    <th scope="row">Age</th>
                                    <td>{{$player->stat->Age}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Height</th>
                                    <td>{{$player->stat->Heightcm}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Weight</th>
                                    <td>{{$player->stat->Weightkg}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Market Value</th>
                                    <td>{{rand('2.5','5')}}M</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nationality</th>
                                    <td>{{$player->nationality}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Average Rating</th>
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
                                        <a href="{{ route('compare', $player->id) }}"  >مقارنة</a>
                                    </th>
                                    <th scope="col"><i class="fas fa-user-plus fa-lg d-sm-none"></i>
                                        <a href="{{ route('players.follow', $player->id) }}"  >متابعــة</a>
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
                        <h4 class="tx-15 text-uppercase mb-3">Stats</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <h4><img src="https://i.ibb.co/LNpGBLf/Egyptian-Premier-League-logo-2023.png"
                                         alt="Egyptian-Premier-League-logo-2023" border="0" style="width:30px ; height: 30px" />
                                    الدوري المصري
                                </h4>
                                <table class="table   " id="example1"  >
                                    <tbody>
                                    <tr>
                                    <tr>
                                        <td>Matches</td>
                                        <td>{{$player->stat->Appearances}}</td>
                                    </tr>

                                    <tr>
                                        <td>Goals</td>
                                        <td>{{$player->stat->totalGoals}}</td>
                                    </tr>
                                    <tr>
                                        <td>Assists</td>
                                        <td>{{$player->stat->goalAssists}}</td>
                                    </tr>
                                    <tr>
                                        <td>Primary Position</td>
                                        @if($player->position == 0)
                                        <td>Goalkeeper</td>
                                        @elseif($player->position == 1)
                                        <td>Defender</td>
                                        @elseif($player->position == 2)
                                        <td>Midfielder</td>
                                        @elseif($player->position == 3)
                                        <td>Forward</td>
                                        @endif

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4><img src="https://i.ibb.co/LNpGBLf/Egyptian-Premier-League-logo-2023.png"
                                         alt="Egyptian-Premier-League-logo-2023" border="0" style="width:30px ; height: 30px" />

                                </h4>
                                <table class="table   " id="example1"  >
                                    <tbody>



                                    <tr>
                                        <td>Started</td>
                                        <td>{{$player->stat->Appearances -2}}</td>
                                    </tr>

                                    <tr>
                                        <td>Minutes played</td>
                                        <td>{{$player->stat->total_play_timein}}</td>
                                    </tr>

                                    <tr>
                                        <td>Yellow cards</td>
                                        <td>{{$player->stat->yellowCards}}</td>
                                    </tr>
                                    <tr>
                                        <td>Red cards</td>
                                        <td>{{$player->stat->redCards}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="col-xl-12">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Team</th>
                                    <th scope="col">Result</th>
                                    <th scope="col">Min</th>
                                    <th scope="col">Goal</th>
                                    <th scope="col">Assist</th>
                                    <th scope="col">Y</th>
                                    <th scope="col">R</th>
                                    <th scope="col">Rating</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $result = ['0-0','1-0','0-1','1-1','2-0',
                                    '2-1','0-2','1-2',
                                    '2-2','3-0','3-1','3-2','4-0','4-1','4-2'];
                                @endphp
                                @foreach($random_clubs as $data)
                                <tr>
                                    <th scope="row">-</th>
                                    <td> VS <img src="{{$data->image}}" alt="Egyptian-Premier-League-logo-2023" border="0" style="width:30px ; height: 30px" /> {{$data->name_ar}}</td>
                                    <td>{{$result[mt_rand(0,12)]}}</td>
                                    <td>{{rand(60,90)}}</td>
                                    <td>{{rand(0,3)}}</td>
                                    <td>{{rand(0,3)}}</td>
                                    <td>{{rand(0,1)}}</td>
                                    <td>{{rand(0,1)}}</td>
                                    @php
                                        $random_number = rand(0, 10);
                                        $class = $random_number > 5 ? 'text-success' : 'text-danger';
                                        $value = $random_number > 5 ? rand(6, 9.5) : rand(4, 5.5);
                                    @endphp
                                    <td class="{{ $class }}">
                                        <span class="{{ $class }}">{{ $value }}</span>
                                    </td>
                                @endforeach


                                </tbody>
                            </table>
                        </div>

                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title mg-b-0">Attack Stats</h4>
                                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap text-center" id="example1">

                                                <tr>
                                                    <th style="font-weight: 1000">احصائيات عامه</th>
                                                    <th style="font-weight: 1000">إجمالي</th>
                                                    <th style="font-weight: 1000"> متوسط في كل 90 دقيقه</th>
                                                    <th style="font-weight: 1000">نسبه مئويه %</th>
                                                </tr>

                                                <tr>
                                                    <th style="font-weight: 1000">عدد المباريات</th>
                                                    <td>{{$player->stat->Appearances}}</td>
                                                    <td>{{$player->stat->average_play_timemin}}</td>
                                                    @php
                                                        $totalMatches = 13;
                                                        $percentage = ($player->stat->Appearances / $totalMatches) * 100;
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
                                                    $totalminutes = $player->stat->total_play_timein;
                                                    $totalgoals = $player->stat->totalGoals;
                                                    $totalassists = $player->stat->goalAssists;
                                                    $percentage_goals = ( $totalgoals/ $player->stat->Appearances) * 100;
                                                    $percentage_assists = ( $totalassists/ $player->stat->Appearances) * 100;
                                                @endphp

                                                <tr>
                                                    <th style="font-weight: 1000">أهداف</th>
                                                    <td>{{$player->stat->totalGoals}}</td>
                                                    <td>{{number_format(($totalgoals/$totalminutes)*90 ,2 )}}</td>

                                                    <td>
                                                        @if($percentage_assists >= 85)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                     style="width: {{$percentage_assists}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{round($percentage_assists)}}%</div>
                                                            </div>

                                                        @elseif($percentage_goals >= 75)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                     style="width: {{$percentage_goals}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{round($percentage_goals)}}%</div>
                                                            </div>

                                                        @elseif($percentage_goals >= 50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                                     style="width: {{$percentage_goals}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{round($percentage_goals)}}%</div>
                                                            </div>

                                                        @elseif($percentage_goals >=25)
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
                                                    <th style="font-weight: 1000">صناعة أهداف</th>
                                                    <td>{{$player->stat->goalAssists}}</td>
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
                                                    $random= mt_rand(50, 100) / 100;
                                                    $random_xa=mt_rand(50,100)/100;
                                                    $percentage_xg = $random*100;
                                                    $percentage_xa = $random_xa*100;
                                                @endphp
                                                <tr>
                                                    <th style="font-weight: 1000">أهداف متوقعه</th>
                                                    <td>{{ $random }}</td>
                                                    <td style="color: silver" >N/A</td>

                                                    <td>
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
                                                    <th style="font-weight: 1000">أسيستات متوقعه</th>
                                                    <td>{{$random_xa}}</td>
                                                    <td style="color: silver" >N/A</td>
                                                    <td>
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

                                                    $totalpasses = rand(1500, 2500);
                                                    $totalpasses_correct = rand(50, 100)/100;
                                                    $appearances = $player->stat->Appearances;
                                                    $avg_passes_per_appearance = $totalpasses / $appearances;
                                                    $avg_passes_per_90_minutes = ($avg_passes_per_appearance / 90) * 90;
                                                    $percentage_passes = $totalpasses_correct * 100;

                                                @endphp
                                                <tr>
                                                    <th style="font-weight: 1000"> عدد التمريرات الكلي</th>
                                                    <td>{{$totalpasses}}</td>
                                                    <td>{{round($avg_passes_per_90_minutes)}}</td>
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
                                                    $percentage_card=$player->stat->yellowCards/$player->stat->Appearances;
                                                    $percentage_card_red=$player->stat->redCards/$player->stat->Appearances;
                                                @endphp


                                                <tr>
                                                    <th style="font-weight: 1000">كروت صفراء</th>
                                                    <td>{{$player->stat->yellowCards}}</td>
                                                    <td style="color: silver" >N/A</td>
                                                    <td title=" عدد الكروت الصفراء في كل 90 دقيقه">
                                                        @if($percentage_card >= 85)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                     style="width: {{$percentage_card}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{number_format($percentage_card , 2 )}}%</div>
                                                            </div>

                                                        @elseif($percentage_card >= 75)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                     style="width: {{$percentage_card}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{number_format($percentage_card , 2 )}}%</div>
                                                            </div>

                                                        @elseif($percentage_card >= 50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                                     style="width: {{$percentage_card}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{number_format($percentage_card , 2 )}}%</div>
                                                            </div>

                                                        @elseif($percentage_card >=25)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                     style="width: {{$percentage_card}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{number_format($percentage_card , 2 )}}%</div>
                                                            </div>

                                                        @elseif($percentage_card >=0)

                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                     style="width: {{$percentage_card}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{number_format($percentage_card , 2 )}}%</div>
                                                            </div>

                                                        @endif
                                                    </td>


                                                </tr>

                                                <tr>
                                                    <th style="font-weight: 1000">كروت حمراء</th>
                                                    <td>{{$player->stat->redCards}}</td>
                                                    <td style="color: silver" >N/A</td>
                                                    <td title=" عدد الكروت الصفراء في كل 90 دقيقه">
                                                        @if($percentage_card_red >= 85)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                     style="width: {{$percentage_card_red}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{number_format($percentage_card_red , 2 )}}%</div>
                                                            </div>

                                                        @elseif($percentage_card_red >= 75)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                     style="width: {{$percentage_card_red}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{number_format($percentage_card_red , 2 )}}%</div>
                                                            </div>

                                                        @elseif($percentage_card_red >= 50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                                     style="width: {{$percentage_card_red}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{number_format($percentage_card_red , 2 )}}%</div>
                                                            </div>

                                                        @elseif($percentage_card_red >=25)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                     style="width: {{$percentage_card_red}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{number_format($percentage_card_red , 2 )}}%</div>
                                                            </div>

                                                        @elseif($percentage_card_red >=0)

                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                     style="width: {{$percentage_card_red}}%" aria-valuenow="25" aria-valuemin="0"
                                                                     aria-valuemax="100">{{number_format($percentage_card_red , 2 )}}%</div>
                                                            </div>

                                                        @endif
                                                    </td>

                                                </tr>




                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="tab-pane" id="attack">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <hr>

                                <div class="card text-center">

                                    <div class="card-body">
                                        <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">XG</h1>
                                        <h1 class="text-black">{{ mt_rand(50, 100) / 100 }}</h1>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <hr>

                                <div class="card text-center">

                                    <div class="card-body">
                                        <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">XA</h1>
                                        <h1 class="text-black">{{ mt_rand(30, 80) / 100 }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <hr>

                                <div class="card text-center">

                                    <div class="card-body">
                                        <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">X(G+A)</h1>
                                        <h1 class="text-black">{{ mt_rand(30, 70) / 100 }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <hr>

                                <div class="card  text-center">

                                    <div class="card-body">
                                        <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">GOALS PER MATCH	</h1>
                                        <h1 class="text-black">{{ mt_rand(50, 100) / 100 }}</h1>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{--team_play--}}
                    {{--team_play--}}
                    <div class="tab-pane" id="team_play">
                        <div class="row">

                        </div>
                    </div>
                    {{--discipline--}}
                    {{--discipline--}}
                    <div class="tab-pane" id="discipline">
                        <div class="row">

                        </div>
                    </div>
                    {{--Defence--}}
                    {{--Defence--}}
                    <div class="tab-pane" id="defence">
                        <div class="row">

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
