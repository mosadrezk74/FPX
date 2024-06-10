@extends('Dashboard.layouts.master')
@section('title')
    @if(App::getlocale() == 'ar')
        احصائيات {{$player->name_ar}}
    @else
        Statistics {{$player->name_en}}
    @endif
@stop
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
@endsection
@php
    use Illuminate\Support\Facades\Auth;
    $coach = \App\Models\Coach::with('club')->first();
@endphp

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('index.statistics') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    / @if(App::getlocale() == 'ar') {{$player->name_ar}} @else {{$player->name_en}} @endif
                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class="main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">
                                @if(App::getlocale() == 'ar')
                                    {{ trans('index.statistics') }} {{$player->name_ar}}
                                @else
                                    {{$player->name_en}} {{ trans('index.statistics') }}
                                @endif
                            </h1>
                            <div class="billed-from">
                                <h6>{{ trans('index.info') }}</h6>
                                <p>FPX Team.<br>Email: fpx2024@gmail.com</p>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">{{ trans('index.info_player') }}</label>
                                <p class="invoice-info-row">
                                    <span>{{ trans('player.photo_player') }}</span>
                                    <span><img width="70px" height="70px" alt="image" src="{{$player->photo}}" /></span>
                                </p>
                                <p class="invoice-info-row">
                                    <span>{{ trans('player.name') }}</span>
                                    <span>
                                        @if(App::getlocale() == 'ar')
                                            {{$player->name_ar}}
                                        @else
                                            {{$player->name_en}}
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
{{--                        ######################################################################--}}
                        <div class="table-responsive mg-t-40">
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
                                                <th style="font-weight: 1000">{{trans('index.b_stats')}}</th>
                                                <th style="font-weight: 1000">{{trans('index.total')}}</th>
                                                <th style="font-weight: 1000">{{trans('index.avg')}}</th>
                                                <th style="font-weight: 1000">{{trans('index.per')}}</th>
                                            </tr>

                                            <tr>
                                                <th style="font-weight: 1000">{{trans('index.MP')}}</th>
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
                                                $totalassists = ($player->stat->Assists * $player->stat->MP);
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
                                                <td>{{$player->stat->Assists * $player->stat->MP }}</td>
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

{{--                        ######################################################################--}}
                        <div class="table-responsive mg-t-40">
                            <h5 class="text-center">{{ trans('index.p_info') }}</h5><br>
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>{{ trans('player.name') }}</th>
                                    <th>{{ trans('player.age') }}</th>
                                    <th>{{ trans('player.club_name') }}</th>
                                    <th>{{ trans('player.shirt_number') }}</th>
                                    <th>{{ trans('player.nationality') }}</th>
                                    <th>{{ trans('player.position') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="tx-12">
                                        @if(App::getlocale() == 'ar')
                                            {{$player->name_ar}}
                                        @else
                                            {{$player->name_en}}
                                        @endif
                                    </td>
                                    <td class="tx-12">{{ $player->age_in_years }}</td>
                                    <td class="tx-12">
                                        @if(App::getlocale() == 'ar')
                                            {{$player->club->name_ar}}
                                        @else
                                            {{$player->club->name_en}}
                                        @endif
                                    </td>
                                    <td class="tx-12">{{ $player->shirt_number }}</td>
                                    <td class="tx-12">
                                        @if(App::getLocale()=='ar')
                                            {{$player->country->name_ar}}
                                        @else
                                            {{$player->country->name_en}}
                                        @endif
                                    </td>
                                    <td class="tx-12">
                                        @if($player->position == 0)
                                            {{ trans('site/index.goalKeeper') }}
                                        @elseif($player->position == 1)
                                            {{ trans('site/index.defender') }}
                                        @elseif($player->position == 2)
                                            {{ trans('site/index.mid') }}
                                        @elseif($player->position == 3)
                                            {{ trans('site/index.forward') }}
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <h5 class="text-center">{{ trans('index.player_stats') }}</h5><br>
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>{{ trans('stat.MP') }}</th>
                                    <th>{{ trans('stat.Min') }}</th>
                                    <th>{{ trans('stat.s90') }}</th>
                                    <th>{{ trans('stat.Goals') }}</th>
                                    <th>{{ trans('stat.SoT') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="tx-12">{{ $player->stat->MP }}</td>
                                    <td class="tx-12">{{ $player->stat->Min }}</td>
                                    <td class="tx-12">{{ $player->stat->s90 }}</td>
                                    <td class="tx-12">{{ $player->stat->Goals }}</td>
                                    <td class="tx-12">{{ $player->stat->SoT }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>{{ trans('stat.PasTotAtt') }}</th>
                                    <th>{{ trans('stat.PasTotCmp') }}</th>
                                    <th>{{ trans('stat.PasTotCmp_per') }}</th>
                                    <th>{{ trans('stat.PasShoCmp') }}</th>
                                    <th>{{ trans('stat.PasMedCmp') }}</th>
                                    <th>{{ trans('stat.PasLonCmp') }}</th>
                                    <th>{{ trans('stat.Assists') }}</th>
                                    <th>{{ trans('stat.PasAss') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="tx-12">{{ intval($player->stat->PasTotAtt * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->PasTotCmp * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ $player->stat->PasTotCmp_per }}%</td>
                                    <td class="tx-12">{{ intval($player->stat->PasShoCmp * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->PasMedCmp * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->PasLonCmp * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->Assists * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->PasAss) }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>{{ trans('stat.Tkl') }}</th>
                                    <th>{{ trans('stat.TklWon') }}</th>
                                    <th>{{ trans('stat.TklDef3rd') }}</th>
                                    <th>{{ trans('stat.TklMid3rd') }}</th>
                                    <th>{{ trans('stat.TklAtt3rd') }}</th>
                                    <th>{{ trans('stat.TklDri') }}</th>
                                    <th>{{ trans('stat.TklDriAtt') }}</th>
                                    <th>{{ trans('stat.TklDri_per') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="tx-12">{{ intval($player->stat->Tkl * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->TklWon * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->TklDef3rd * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->TklMid3rd * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->TklAtt3rd * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->TklDri * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ intval($player->stat->TklDriAtt * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ $player->stat->TklDri_per }}%</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr class="mg-b-40">


                        <a href="#" class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()">
                            <i class="mdi mdi-printer ml-1"></i>{{ trans('index.print') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection
