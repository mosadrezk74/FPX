@extends('Dashboard.layouts.master')

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                @if (App::getlocale() == 'ar')
                    <p class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> مرحبا {{ Auth::user()->name_ar }} </p>
                @else
                    <p class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Welcome {{ Auth::user()->name_en }} </p>
                @endif
            </div>
        </div>

        <div class="main-dashboard-header-right">

            <div>
                <label class="tx-13">{{ trans('index.day') }}</label>
                @if (app::getlocale() == 'ar')
                    <h6>{{ $dayOfWeekArabic }}</h6>
                @else
                    <h6>{{ $dayOfWeekEnglish }}</h6>
                @endif
            </div>
            <div id="real-time-clock">
                <label class="tx-13">{{ trans('index.time') }}</label>
                <h6>{{ $time }}</h6>
            </div>

            <div>
                <label class="tx-13">{{ trans('index.date') }}</label>
                <h6>{{ date('Y-m-d') }}</h6>
            </div>
        </div>

    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3">


            <div class="card text-center bg-primary-gradient text-white ">
                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">{{ trans('index.MP') }} </h1>
                    <h1 class="text-black">{{ $player->stat->MP }}</h1>
                </div>
            </div>
            <hr>
        </div>

        <div class="col-lg-3 col-md-3">


            <div class="card text-center bg-primary-gradient text-white ">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">{{ trans('index.goals') }}</h1>
                    <h1 class="text-black">{{ $player->stat->Goals }}</h1>
                </div>
            </div>
            <hr>

        </div>
        <div class="col-lg-3 col-md-3">


            <div class="card text-center bg-primary-gradient text-white ">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">{{ trans('index.assists') }}</h1>
                    <h1 class="text-black">{{ intval($player->stat->Assists * $player->stat->MP) }}</h1>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-lg-3 col-md-3">


            <div class="card text-center bg-primary-gradient text-white ">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">{{ trans('index.rating') }}</h1>
                    <h1 class="text-black">{{ mt_rand(50, 100) / 10 }}</h1>
                </div>
            </div>
            <hr>
        </div>




        <div class="col-lg-3 col-md-3">


            <div class="card text-center bg-primary-gradient text-white ">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">{{ trans('index.rank') }}</h1>
                    <h1 class="text-black">{{ $rank }} #</h1>
                </div>
            </div>


        </div>
        <div class="col-lg-3 col-md-3">


            <div class="card text-center bg-primary-gradient text-white ">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">{{ trans('index.rankLeg') }}</h1>
                    <h1 class="text-black">{{ $rank_leg }} # </h1>
                </div>
            </div>


        </div>
        <div class="col-lg-3 col-md-3">


            <div class="card text-center bg-primary-gradient text-white ">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">{{ trans('index.market') }}</h1>
                    <h1 class="text-black">{{ $player->stat->SoT * 10 }}M </h1>
                </div>
            </div>


        </div>
        <div class="col-lg-3 col-md-3">


            <div class="card text-center bg-primary-gradient text-white ">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">{{ trans('index.dd') }}</h1>
                    <h1 class="text-black">{{ $TopGoals }} # </h1>
                </div>
            </div>


        </div>









        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <div class="main-content-label tx-12 mg-b-15">
                    {{ trans('index.g_stats') }}
                </div>
                <div class="ht-200 ht-lg-250">
                    <div class="list-group-item border-top-0" title="Dollar">
                        <p>{{ trans('index.market') }}</p>
                        <span>{{ $player->stat->SoT * 10 }}M</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>{{ trans('player.height') }}</p>
                        <span>{{ $player->height }}</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>{{ trans('player.weight') }}</p>
                        <span>{{ $player->weight }}</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>{{ trans('player.age') }}</p>
                        <span>{{ $player->age_in_years }}</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>{{ trans('player.nationality') }}</p>
                        @if (App::getLocale() == 'ar')
                            <span>{{ $player->country->name_ar }}</span>
                        @else
                            <span>{{ $player->country->name_en }}</span>
                        @endif

                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <div class="main-content-label tx-12 mg-b-15">
                    {{ trans('index.lastFive') }}
                </div>
                <div class="ht-200 ht-lg-250">
                    @foreach ($random_clubs as $rand)
                        <div class="list-group-item border-top-0">
                            @if (App::getLocale() == 'ar')
                                <p>{{ $player->name_ar }} vs {{ $rand->name_ar }}</p>
                            @elseif(App::getLocale() == 'en')
                                <p>{{ $player->name_en }} vs {{ $rand->name_en }}</p>
                            @endif

                            <span><a href="">{{ mt_rand(50, 100) / 10 }}</a></span>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <div class="main-content-label tx-12 mg-b-15">
                    {{ trans('index.stats') }}
                </div>
                <div class="ht-200 ht-lg-250">
                    <table class="table" id="example1">
                        <tr>
                            <th>{{ trans('index.MP') }}</th>
                            <th>{{ $player->stat->MP }}</th>
                        </tr>

                        <tr>
                            <th>{{ trans('index.min') }}</th>
                            <th>{{ $player->stat->Min }}</th>
                        </tr>


                        <tr>
                            <th>
                                <img src="{{ asset('Dashboard\y.png') }}" style="width: 10px;height: 15px"
                                    alt="Yellow Card">
                                {{ trans('index.ycard') }}
                            </th>
                            <th>{{ intval($player->stat->CrdY * $player->stat->MP) }}</th>
                        </tr>


                        <tr>
                            <th>
                                <img src="{{ asset('Dashboard\r.png') }}" style="width: 10px;height: 15px"
                                    alt="Yellow Card">
                                {{ trans('index.rcard') }}

                            </th>
                            <th>{{ $player->stat->CrdR * $player->stat->MP }}</th>
                        </tr>
                        <tr>
                            <th>{{ trans('index.rating') }}</th>
                            <th>
                                <p class="card-text">
                                    @if (rand() > 5)
                                        <span class="bg-primary text-white">{{ rand(5, 10) }}</span>
                                    @elseif(rand() < 5)
                                        <span class="bg-danger text-white">{{ rand(0, 4) }}</span>
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
                <h6 class="card-title">{{ trans('index.topScore') }}</h6>
                <div class="list-group">
                    @foreach ($topLegScorer as $player)
                        <div class="list-group-item border-top-0 {{ $loop->first ? 'bg-primary text-white' : '' }} "
                            style="{{ $loop->first ? 'height: 60px; font-size: 17px ;  ' : '' }}">
                            <p>{{ $loop->iteration }} # </p>
                            <img alt="image" class="flag-icon  flag-icon-squared flag-icon-lg"
                                src="{{ $player->photo }}" />
                            @if (App::getlocale() == 'ar')
                                <a href="{{ route('stats.show', $player->id) }}"
                                    {{ $loop->first ? 'class=text-white' : '' }}>{{ $player->name_ar }}</a>
                                <span {{ $loop->first ? 'class=text-white' : '' }}>{{ $player->stat->Goals }} </span>
                            @else
                                <a href="{{ route('stats.show', $player->id) }}"
                                    {{ $loop->first ? 'class=text-white' : '' }}>{{ $player->name_en }}</a>
                                <span {{ $loop->first ? 'class=text-white' : '' }}>{{ $player->stat->Goals }} </span>
                            @endif
                        </div>
                    @endforeach
                </div>
                <hr>
                <h6 class="card-title">{{ trans('index.topassist') }}</h6>
                <div class="list-group">
                    @foreach ($topAssisterLeg as $player)
                        <div class="list-group-item border-top-0 {{ $loop->first ? 'bg-primary text-white' : '' }} "
                            style="{{ $loop->first ? 'height: 60px; font-size: 17px ;  ' : '' }}">
                            <p>{{ $loop->iteration }} # </p>
                            <img alt="image" class="flag-icon  flag-icon-squared flag-icon-lg"
                                src="{{ $player->photo }}" />
                            @if (App::getlocale() == 'ar')
                                <a href="{{ route('stats.show', $player->id) }}"
                                    {{ $loop->first ? 'class=text-white' : '' }}>{{ $player->name_ar }}</a>
                                <span
                                    {{ $loop->first ? 'class=text-white' : '' }}>{{ intval($player->stat->Assists * $player->stat->MP) }}
                                </span>
                            @else
                                <a href="{{ route('stats.show', $player->id) }}"
                                    {{ $loop->first ? 'class=text-white' : '' }}>{{ $player->name_en }}</a>
                                <span
                                    {{ $loop->first ? 'class=text-white' : '' }}>{{ intval($player->stat->Assists * $player->stat->MP) }}
                                </span>
                            @endif
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
        <div class="col-md-0 col-lg-0 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">{{ trans('index.standings') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <div class="table-responsive country-table">
                    <table class="table   table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                            <tr>
                                <th class="wd-lg-10p">{{ trans('index.standing') }}</th>
                                <th class="wd-lg-30p">{{ trans('index.team_name') }}</th>
                                <th class="wd-lg-10p tx-right">{{ trans('index.played') }}</th>
                                <th class="wd-lg-10p tx-right">{{ trans('index.won') }}</th>
                                <th class="wd-lg-10p tx-right">{{ trans('index.draw') }}</th>
                                <th class="wd-lg-10p tx-right">{{ trans('index.lost') }}</th>
                                <th class="wd-lg-10p tx-right">{{ trans('index.goal_in') }}</th>
                                <th class="wd-lg-10p tx-right">{{ trans('index.goal_out') }}</th>
                                <th class="wd-lg-10p tx-right">{{ trans('index.goal_diff') }}</th>
                                <th class="wd-lg-15p tx-right">{{ trans('index.points') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tables as $table)
                                <tr>
                                    <td class="tx-right tx-medium tx-inverse">{{ $loop->iteration }}</td>

                                    @if (App::getlocale() == 'ar')
                                        <td class="tx-right tx-medium tx-inverse">
                                            <img src="{{ $table->image }}" class="wd-30 ht-30" alt="img">
                                            {{ $table->team_ar }}
                                        </td>
                                    @else
                                        <td class="tx-right tx-medium tx-inverse">
                                            <img src="{{ $table->image }}" class="wd-30 ht-30" alt="img"
                                                style="float: left; margin-right: 10px;">
                                            {{ $table->team_en }}
                                        </td>
                                    @endif
                                    <td class="tx-right tx-medium tx-inverse">{{ $table->mp }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $table->won }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $table->draw }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $table->lose }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $table->gf }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $table->ga }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $table->gd }}</td>
                                    <td class="tx-right tx-medium tx-danger tx-bold">{{ $table->points }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>







    </div>
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('Dashboard/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('Dashboard/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('Dashboard/js/index.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/jquery.vmap.sampledata.js') }}"></script>

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
@endsection
