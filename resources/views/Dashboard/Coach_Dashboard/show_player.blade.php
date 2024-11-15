@extends('Dashboard.layouts.master')
@php
    $rating = [1, 1.5, 2.5, 2, 3.5, 3, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 9, 10, 8.5, 9.5];
    $random_key = array_rand($rating);

    $random_number = $rating[$random_key];
@endphp
@section('title')
    {{ trans('index.statistics') }}
@stop
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('index.statistics') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('index.veiw_all') }}</span>
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
                        <img alt="" src="{{ $player->photo }}" width="200px" height="200px"
                            class="brround img-fluid">
                        <img alt="Club Logo" src="{{ $player->club->image }}" class="club-logo ml-1" width="30"
                            height="30">
                        @if (App::getlocale() == 'ar')
                            <h1 class="card-subtitle mb-2 text-muted align-items-center  text-center "
                                style="padding-left: 15px;">{{ $player->name_ar }}</h1>
                        @else
                            <h1 class="card-subtitle mb-2 text-muted align-items-center  text-center "
                                style="padding-left: 15px;">{{ $player->name_en }}</h1>
                        @endif
                        @if ($player->position == 0)
                            <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center "
                                style="padding-left: 15px;">
                                {{ trans('player.goalkeeper') }}</h3>
                        @elseif($player->position == 1)
                            <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center "
                                style="padding-left: 15px;">{{ trans('player.defender') }}</h3>
                        @elseif($player->position == 2)
                            <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center "
                                style="padding-left: 15px;">{{ trans('player.midfielder') }}</h3>
                        @elseif($player->position == 3)
                            <h3 class="card-subtitle mb-2 text-muted align-items-center  text-center "
                                style="padding-left: 15px;">{{ trans('player.forward') }}</h3>
                        @endif
                        <h5 class="card-subtitle mb-2 text-muted align-items-center  " style="padding-left: 15px;">
                            {{ $player->shirt_number }}#</h5>
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
                                        <th scope="row">{{ trans('player.age') }}</th>
                                        <td>{{ $player->age_in_years }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">{{ trans('player.height') }}</th>
                                        <td>{{ $player->height }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">{{ trans('player.weight') }}</th>
                                        <td>{{ $player->weight }}</td>

                                    </tr>

                                    <tr>
                                        <th scope="row">{{ trans('player.nationality') }}</th>
                                        @if (App::getLocale() == 'ar')
                                            <td>{{ $player->country->name_ar }}</td>
                                        @else
                                            <td>{{ $player->country->name_en }}</td>
                                        @endif

                                    </tr>
                                    <tr>
                                        <th scope="row">{{ trans('index.rating') }}</th>
                                        <th>
                                            <p class="card-text">
                                                @if (rand() > 5)
                                                    <span class="bg-success text-white">{{ rand(5, 10) }}</span>
                                                @elseif(rand() < 5)
                                                    <span class="bg-danger text-white">{{ rand(0, 4) }}</span>
                                                @endif
                                            </p>
                                        </th>
                                    </tr>
                                </tbody>
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
                        <h4 class="tx-15 text-uppercase mb-3">{{ trans('index.b_stats') }}</h4>
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                        <h1 class=" text-white">{{ $player->stat->MP }}</h1>
                                        <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{ trans('stat.MP') }}
                                        </h1>

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3">

                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                        <h1 class=" text-white">{{ $player->stat->Goals }}</h1>
                                        <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">
                                            {{ trans('index.goal') }}</h1>

                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-3 col-md-3">
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                        <h1 class=" text-white">{{ intval($player->stat->Assists * $player->stat->MP) }}
                                        </h1>
                                        <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">
                                            {{ trans('index.assist') }}</h1>

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3">
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                        <h1 class=" text-white">{{ intval($player->stat->PasTotCmp * $player->stat->MP) }}
                                        </h1>
                                        <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">
                                            {{ trans('index.passes') }}</h1>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title mg-b-0">{{ trans('index.stats') }}</h4>
                                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap text-center" id="example">

                                                <tr>
                                                    <th style="font-weight: 1000">{{ trans('index.b_stats') }}</th>
                                                    <th style="font-weight: 1000">{{ trans('index.total') }}</th>
                                                    <th style="font-weight: 1000">{{ trans('index.avg') }}</th>
                                                    <th style="font-weight: 1000">{{ trans('index.per') }}</th>
                                                </tr>

                                                <tr>
                                                    <th style="font-weight: 1000">{{ trans('index.MP') }}</th>
                                                    <td>{{ $player->stat->MP }}</td>
                                                    <td>{{ $player->stat->Min }}</td>
                                                    @php
                                                        $totalMatches = 20;
                                                        $percentage = ($player->stat->MP / $totalMatches) * 100;
                                                    @endphp
                                                    <td>
                                                        @if ($percentage >= 85)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: {{ $percentage }}%" aria-valuenow="25"
                                                                    aria-valuemin="0" aria-valuemax="100">
                                                                    {{ round($percentage) }}%</div>
                                                            </div>
                                                        @elseif($percentage >= 75)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: {{ $percentage }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage) }}%</div>
                                                            </div>
                                                        @elseif($percentage >= 50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                                    style="width: {{ $percentage }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage) }}%</div>
                                                            </div>
                                                        @elseif($percentage >= 25)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage) }}%</div>
                                                            </div>
                                                        @elseif($percentage >= 0)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage) }}%</div>
                                                            </div>
                                                        @endif
                                                    </td>


                                                </tr>
                                                @php
                                                    $totalminutes = $player->stat->Min;
                                                    $totalgoals = $player->stat->Goals;
                                                    $totalassists = $player->stat->Assists * $player->stat->MP;
                                                    $percentage_goals = ($totalgoals / $player->stat->MP) * 100;
                                                    $percentage_assists = ($totalassists / $player->stat->MP) * 100;
                                                @endphp

                                                <tr>
                                                    <th style="font-weight: 1000">{{ trans('index.goal') }}</th>
                                                    <td>{{ $player->stat->Goals }}</td>
                                                    <td>{{ number_format(($totalgoals / $totalminutes) * 90, 2) }}</td>

                                                    <td>
                                                        @if ($percentage_assists > 85)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: {{ $percentage_assists }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_assists) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_goals > 75)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: {{ $percentage_goals }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_goals) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_goals > 50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                                    style="width: {{ $percentage_goals }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_goals) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_goals > 25)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage_goals }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_goals) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_goals >= 0)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage_goals }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_goals) }}%
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>


                                                </tr>


                                                <tr>
                                                    <th style="font-weight: 1000">{{ trans('index.assist') }}</th>
                                                    <td>{{ $player->stat->Assists * $player->stat->MP }}</td>
                                                    <td>{{ number_format(($totalassists / $totalminutes) * 90, 2) }}</td>

                                                    <td>
                                                        @if ($percentage_goals >= 85)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: {{ $percentage_assists }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_assists) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_assists >= 75)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: {{ $percentage_assists }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_assists) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_assists >= 50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                                    style="width: {{ $percentage_assists }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_assists) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_assists >= 25)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage_assists }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_assists) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_assists >= 0)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage_assists }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_assists) }}%
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>


                                                </tr>


                                                @php
                                                    $MP = $player->stat->MP;
                                                    $percentage_passes = $player->stat->PasTotCmp_per;
                                                @endphp
                                                <tr>
                                                    <th style="font-weight: 1000">{{ trans('index.passes') }}</th>
                                                    <td>{{ $player->stat->PasTotCmp * 10 }}</td>
                                                    <td>{{ $player->stat->PasTotCmp_per }}</td>
                                                    <td title="نسبه عدد التمريرات الصحيحه في 90 دقيقه">
                                                        @if ($percentage_passes >= 85)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: {{ $percentage_passes }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_passes) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_passes >= 75)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: {{ $percentage_passes }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_passes) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_passes >= 50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                                    style="width: {{ $percentage_passes }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_passes) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_passes >= 25)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage_passes }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_passes) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_passes >= 0)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage_passes }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_passes) }}%
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>

                                                @php
                                                    $random = mt_rand(50, 100) / 100;
                                                    $random_xa = mt_rand(50, 100) / 100;
                                                    $percentage_xg = $player->stat->G_SoT * 100;
                                                    $percentage_xa = $random_xa * 100;
                                                @endphp
                                                <tr>
                                                    <th style="font-weight: 1000">{{ trans('index.xg') }}</th>
                                                    <td>{{ $player->stat->SoT }}</td>
                                                    <td style="color: silver">N/A</td>

                                                    <td title="عدد الأهداف المسجلة من خلال التسديدات الدقيقة على المرمى">
                                                        @if ($percentage_xg >= 85)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: {{ $percentage_xg }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_xg) }}%</div>
                                                            </div>
                                                        @elseif($percentage_xg >= 75)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: {{ $percentage_xg }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_xg) }}%</div>
                                                            </div>
                                                        @elseif($percentage_xg >= 50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                                    style="width: {{ $percentage_xg }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_xg) }}%</div>
                                                            </div>
                                                        @elseif($percentage_xg >= 25)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage_xg }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_xg) }}%</div>
                                                            </div>
                                                        @elseif($percentage_xg >= 0)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage_xg }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_xg) }}%
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>



                                                </tr>

                                                <tr>
                                                    <th style="font-weight: 1000">{{ trans('index.xa') }}</th>
                                                    <td>{{ $player->stat->PasAss }}</td>
                                                    <td style="color: silver">N/A</td>
                                                    <td title="نسبه عدد التمريرات التي أدت إلى تسجيل هدف">
                                                        @if ($percentage_xa >= 85)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: {{ $percentage_xa }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_xa) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_xa >= 75)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: {{ $percentage_xa }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_xa) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_xa >= 50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                                    style="width: {{ $percentage_xa }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_xa) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_xa >= 25)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage_xa }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_xa) }}%
                                                                </div>
                                                            </div>
                                                        @elseif($percentage_xa >= 0)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $percentage_xa }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">{{ round($percentage_xa) }}%
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>

                                                </tr>

                                                @php
                                                    $percentage_card =
                                                        (($player->stat->CrdY * 100) / $player->stat->MP) * 100;
                                                    $percentage_card_red =
                                                        (($player->stat->CrdR * 100) / $player->stat->MP) * 100;
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
                                                    <img src="{{ asset('Dashboard\y.png') }}"
                                                        style="width: 10px;height: 15px" alt="Yellow Card">
                                                    {{ trans('index.ycard') }}
                                                </th>
                                                <th>{{ intval($player->stat->CrdY * $player->stat->MP) }}</th>
                                            </tr>


                                            <tr>
                                                <th>
                                                    <img src="{{ asset('Dashboard\r.png') }}"
                                                        style="width: 10px;height: 15px" alt="Yellow Card">
                                                    {{ trans('index.rcard') }}

                                                </th>
                                                <th>{{ $player->stat->CrdR * $player->stat->MP }}</th>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('index.rating') }}</th>
                                                <th>
                                                    <p class="card-text">
                                                        @if (rand() > 5)
                                                            <span
                                                                class="bg-success text-white">{{ rand(5, 10) }}</span>
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
                                    <div class="main-content-label tx-12 mg-b-15">
                                        {{ trans('index.heat') }}
                                    </div>
                                    <div class="ht-200 ht-lg-250">
                                        <div class="list-group-item border-top-0">
                                            <img src="{{ URL::asset('Dashboard/heat.png') }}"
                                                style="width: 600px; height: 230px;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- Shoot Start --}}
                            <div class="col-md-12 col-lg-6 col-xl-6">
                                <div class="card card-dashboard-eight pb-4">
                                    <div class="main-content-label tx-12 mg-b-15">
                                        {{ trans('stat.shoot') }}
                                    </div>
                                    <div class="ht-200 ht-lg-250">
                                        <table class="table" id="example1">
                                            <tr title="{{ trans('stat.des1') }}">
                                                <th>{{ trans('stat.shots') }}</th>
                                                <th>{{ intval($player->stat->Shots * $player->stat->MP) }}</th>
                                            </tr>


                                            <tr title="{{ trans('stat.dec2') }}">
                                                <th>
                                                    {{ trans('stat.SoT_per') }}
                                                </th>
                                                <th>{{ $player->stat->SoT_per }}%</th>
                                            </tr>



                                            <tr title="{{ trans('stat.dec3') }}">
                                                <th>
                                                    {{ trans('stat.ShoDist') }}
                                                </th>
                                                <th>{{ $player->stat->ShoDist }}</th>
                                            </tr>

                                            <tr>
                                                <th>{{ trans('stat.fk') }} ({{ trans('stat.scored') }}) </th>
                                                <th>
                                                    {{ $player->stat->ShoFK * $player->stat->MP }}
                                                    ({{ intval($player->stat->ShoFK) / 2 }})
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>{{ trans('stat.pk') }} ({{ trans('stat.scored') }})</th>
                                                <th>
                                                    {{ intval($player->stat->Pkatt * $player->stat->MP) }}
                                                    ({{ intval(($player->stat->Pkatt * 100) / 4) }})

                                                </th>
                                            </tr>

                                            <tr>
                                                <th>{{ trans('stat.Goals') }}</th>
                                                <th>
                                                    {{ $player->stat->Goals }}
                                                </th>
                                            </tr>






                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- end shooting --}}
                            {{-- ####################################################################### --}}
                            {{-- Shoot Pass --}}
                            <div class="col-md-12 col-lg-3 col-xl-6">
                                <div class="card card-dashboard-eight pb-4">
                                    <div class="main-content-label tx-12 mg-b-15">
                                        {{ trans('stat.pass') }}
                                    </div>
                                    <div class="ht-200 ht-lg-250">
                                        <table class="table" id="example1">

                                            <tr title="{{ trans('stat.pass2') }}">
                                                <th>{{ trans('stat.PasTotAtt') }}</th>
                                                <th>{{ intval($player->stat->PasTotAtt * $player->stat->MP) }}</th>
                                            </tr>



                                            <tr title="{{ trans('stat.pass1') }}">
                                                <th>{{ trans('stat.PasTotCmp') }}</th>
                                                <th>{{ intval($player->stat->PasTotCmp * $player->stat->MP) }}</th>
                                            </tr>



                                            <tr title="{{ trans('stat.pass3') }}">
                                                <th>
                                                    {{ trans('stat.PasTotCmp_per') }}
                                                </th>
                                                <th>
                                                    {{ $player->stat->PasTotCmp_per }}%
                                                </th>
                                            </tr>


                                            <tr title="{{ trans('stat.PasCrs') }}">
                                                <th>
                                                    {{ trans('stat.PasCrs') }}
                                                </th>
                                                <th>{{ intval($player->stat->PasCrs * $player->stat->MP) }}</th>
                                            </tr>


                                            <tr title="{{ trans('stat.pass5') }}">
                                                <th>
                                                    {{ trans('stat.PasProg') }}
                                                </th>
                                                <th>{{ intval($player->stat->PasProg * $player->stat->MP) }}</th>
                                            </tr>




                                            <tr title="{{ trans('stat.Assists') }}">
                                                <th> {{ trans('stat.Assists') }}</th>

                                                <th>{{ intval($player->stat->Assists * $player->stat->MP) }}</th>
                                            </tr>

                                        </table>


                                    </div>
                                </div>
                            </div>
                            {{-- end passing --}}
                            {{-- ################################################# --}}
                            {{-- Attack Start --}}
                            <div class="col-md-12 col-lg-3 col-xl-6">
                                <div class="card card-dashboard-eight pb-5">
                                    <div class="main-content-label tx-12 mg-b-15">
                                        {{ trans('stat.attack') }}
                                    </div>
                                    <div class="ht-200 ht-lg-250">
                                        <table class="table" id="example1">


                                            <tr>
                                                <th> {{ trans('stat.SCA') }}</th>
                                                <th>{{ intval($player->stat->SCA * $player->stat->MP) }}</th>
                                            </tr>


                                            <tr title="{{ trans('stat.GCA') }} ">
                                                <th>{{ trans('stat.GCA') }}</th>
                                                <th>{{ $player->stat->GCA }}</th>
                                            </tr>


                                            <tr>
                                                <th> {{ trans('stat.ScaDrib') }} </th>
                                                <th>{{ intval($player->stat->ScaDrib) }}</th>
                                            </tr>




                                            <tr title="{{ trans('stat.ScaDrib_desc') }} ">
                                                <th>{{ trans('stat.ScaSh') }}</th>
                                                <th>{{ $player->stat->ScaSh }}</th>
                                            </tr>

                                            <tr title="{{ trans('stat.ScaDrib_desc') }} ">
                                                <th>{{ trans('stat.Carries') }}</th>
                                                <th>{{ intval($player->stat->Carries) }}</th>
                                            </tr>

                                            <tr>
                                                <th>{{ trans('stat.GCA') }} </th>
                                                <td>{{ intval($player->stat->GCA * $player->stat->MP) }}</td>
                                            </tr>




                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Attack End --}}
                            {{-- ######################################################### --}}
                            {{-- Shoot Start --}}
                            <div class="col-md-12 col-lg-3 col-xl-6">
                                <div class="card card-dashboard-eight pb-5">
                                    <div class="main-content-label tx-12 mg-b-15">
                                        {{ trans('stat.def') }}
                                    </div>
                                    <div class="ht-200 ht-lg-250">
                                        <table class="table" id="example1">
                                            <tr title="{{ trans('stat.Tkl') }}">
                                                <th>{{ trans('stat.Tkl') }}</th>
                                                <th>{{ intval($player->stat->Tkl * $player->stat->MP) }}</th>
                                            </tr>

                                            <tr title="{{ trans('stat.TklWon_def') }}">
                                                <th> {{ trans('stat.TklWon') }} </th>
                                                <th>{{ intval($player->stat->TklWon * $player->stat->MP) }}</th>
                                            </tr>
                                            <tr title="{{ trans('stat.def') }} ">
                                                <th> {{ trans('stat.TklDef3rd') }} </th>
                                                <th>{{ intval($player->stat->TklDef3rd * $player->stat->MP) }}</th>
                                            </tr>
                                            <tr title="{{ trans('stat.TklDef3rd') }}">
                                                <th> {{ trans('stat.TklMid3rd') }}</th>
                                                <th>{{ intval($player->stat->TklMid3rd * $player->stat->MP) }}</th>
                                            </tr>
                                            <tr title="{{ trans('stat.TklAtt3rd') }}">
                                                <th> {{ trans('stat.TklAtt3rd') }}</th>
                                                <th>{{ intval($player->stat->TklAtt3rd * $player->stat->MP) }}</th>
                                            </tr>



                                            <tr title="{{ trans('stat.Recov') }}">
                                                <th> {{ trans('stat.Recov') }}</th>
                                                <th>{{ intval($player->stat->Recov * $player->stat->MP) }}</th>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- ############################################################################ --}}
                            <div class="col-md-12 col-lg-4 col-xl-4">
                                <div class="card card-dashboard-eight pb-2">
                                    <div class="main-content-label tx-12 mg-b-15">
                                        {{ trans('stat.Blocks') }}
                                    </div>
                                    <div class="ht-200 ht-lg-250">
                                        <table class="table" id="example1">
                                            <tr title="{{ trans('stat.Blocks') }} ">
                                                <th>{{ trans('stat.Blocks') }}</th>
                                                <td>{{ intval($player->stat->Blocks * $player->stat->MP) }}</td>
                                            </tr>

                                            <tr title="{{ trans('stat.BlkSh') }}">
                                                <th>{{ trans('stat.BlkSh') }}</th>
                                                <td>{{ intval($player->stat->BlkSh * $player->stat->MP) }}</td>
                                            </tr>


                                            <tr title="{{ trans('stat.BlkShSv') }}">
                                                <th> {{ trans('stat.BlkShSv') }}</th>
                                                <td>{{ intval($player->stat->BlkShSv * $player->stat->MP) }}</td>
                                            </tr>


                                            <tr title="{{ trans('stat.BlkPass') }}">
                                                <th> {{ trans('stat.BlkPass') }}</th>
                                                <td>{{ intval($player->stat->BlkPass * $player->stat->MP) }}</td>
                                            </tr>
                                            <tr title="{{ trans('stat.Int') }}">
                                                <th>{{ trans('stat.Int') }}</th>
                                                <td>{{ intval($player->stat->Int * $player->stat->MP) }}</td>
                                            </tr>


                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- ############################################################################ --}}
                            <div class="col-md-12 col-lg-4 col-xl-4">
                                <div class="card card-dashboard-eight pb-2">
                                    <div class="main-content-label tx-12 mg-b-15">
                                        {{ trans('stat.dribble') }}
                                    </div>
                                    <div class="ht-200 ht-lg-250">
                                        <table class="table" id="example1">
                                            <tr title="{{ trans('stat.ToAtt') }}  ">
                                                <th> {{ trans('stat.ToAtt') }} </th>
                                                <td>{{ intval($player->stat->ToAtt * 10) * 3 }}</td>
                                            </tr>

                                            <tr title="{{ trans('stat.ToSuc') }}">
                                                <th>{{ trans('stat.ToSuc') }}</th>
                                                <td>{{ intval($player->stat->ToSuc * 10) * 3 }}</td>
                                            </tr>


                                            <tr title="{{ trans('stat.ToSuc_per') }}">
                                                <th> {{ trans('stat.ToSuc_per') }}</th>
                                                <td>{{ $player->stat->ToSuc_per }}%</td>
                                            </tr>


                                            <tr>
                                                <th>{{ trans('stat.Carries') }}</th>
                                                <td>{{ intval($player->stat->Carries) }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('stat.CarProg') }}</th>
                                                <td>{{ intval($player->stat->CarProg) }}</td>
                                            </tr>


                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- ############################################################################ --}}
                            <div class="col-md-12 col-lg-4 col-xl-4">
                                <div class="card card-dashboard-eight pb-2">
                                    <div class="main-content-label tx-12 mg-b-15">
                                        {{ trans('stat.ddd') }}
                                    </div>
                                    <div class="ht-200 ht-lg-250">
                                        <table class="table" id="example1">

                                            <tr title="{{ trans('stat.Clr') }}">
                                                <th>{{ trans('stat.Clr') }} </th>
                                                <td>{{ intval($player->stat->Clr * $player->stat->MP) }}</td>
                                            </tr>

                                            <tr title="{{ trans('stat.Tkl_Int') }}">
                                                <th>{{ trans('stat.Tkl_Int') }} </th>
                                                <td>{{ intval($player->stat->Tkl_Int * $player->stat->MP) }}</td>
                                            </tr>


                                            <tr title="{{ trans('stat.touches') }} ">
                                                <th>{{ trans('stat.touches') }} </th>
                                                <td>{{ intval($player->stat->Touches * $player->stat->MP) }}</td>
                                            </tr>

                                            <tr title="{{ trans('stat.Fls') }} ">
                                                <th>{{ trans('stat.Fls') }} </th>
                                                <td>{{ intval($player->stat->Fls * $player->stat->MP) }}</td>
                                            </tr>

                                            <tr title="{{ trans('stat.Off') }}">
                                                <th>{{ trans('stat.Off') }} </th>
                                                <td>{{ intval($player->stat->Off * $player->stat->MP) }}</td>

                                            </tr>














                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- ############################################################################## --}}



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
