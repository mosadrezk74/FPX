@extends('Dashboard.layouts.master')
@section('title')
    @if(App::getlocale() == 'ar')
        احصائيات  {{$player->name_ar}}
    @else
        Statsistics      {{$player->name_en}}
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
                @if(App::getlocale() == 'ar')
                <h4 class="content-title mb-0 my-auto">{{trans('index.statistics')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$player->name_ar}}</span>
                @else
                <h4 class="content-title mb-0 my-auto">{{trans('index.statistics')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$player->name_en}}</span>
                @endif
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            @if(App::getlocale() == 'ar')
                                <h1 class="invoice-title">{{trans('index.statistics')}} {{$player->name_ar}}</h1)
                            @else
                            <h1 class="invoice-title"> {{$player->name_en}}   {{trans('index.statistics')}}</h1>
                            @endif

                            <div class="billed-from">
                                <h6>{{trans('index.info')}}  </h6>
                                <p>FPX Team.<br>
                                    Email: fpx2024@gmail.com</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">{{trans('index.info_player')}}</label>
                                <p class="invoice-info-row"><span>{{trans('player.photo_player')}}</span> <span><img width="70px" height="70px" alt="image" src="{{$player->photo }}"/></span>
                                </p>
                                <p class="invoice-info-row "><span>{{trans('player.name')}}</span>
                                    @if(App::getlocale() == 'ar')
                                        <span>{{$player->name_ar}}</span>
                                    @else
                                    <span>{{$player->name_en}}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <h5 class="text-center">{{trans('index.p_info')}}</h5><br>
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                     <th>{{trans('player.name')}}</th>
                                    <th>{{trans('player.age')}}</th>
                                    <th>{{trans('player.club_name')}}</th>
                                    <th>{{trans('player.shirt_number')}}</th>
                                    <th>{{trans('player.nationality')}}</th>
                                    <th>{{trans('player.position')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @if(App::getlocale() == 'ar')
                                    <td class="tx-12">{{ $player->name_ar}}</td>
                                    @else
                                    <td class="tx-12">{{ $player->name_en}}</td>
                                    @endif
                                        <td class="tx-12">{{ $player->stat->Age}}</td>

                                    @if(App::getlocale() == 'ar')
                                            <td class="tx-12">{{ $player->club->name_ar}}</td>
                                        @else
                                            <td class="tx-12">{{ $player->club->name_en}}</td>
                                        @endif
                                    <td class="tx-12">{{ $player->stat->Jersey}}</td>
                                    <td class="tx-12">{{ $player->nationality}}</td>
                                    <td class="tx-12">{{ $player->stat->Position}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <h5 class="text-center">{{trans('index.player_stats') }}</h5><br>
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>total_play_time</th>
                                    <th>total_play_time</th>
                                    <th>Appearances</th>
                                    <th>subIns</th>
                                    <th>foulsCommitted</th>
                                    <th>foulsSuffered</th>
                                    <th>ownGoals</th>
                                 </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="tx-12">{{ $player->stat->total_play_timein}}</td>
                                    <td class="tx-12">{{ $player->stat->total_play_timein}}</td>
                                    <td class="tx-12">{{ $player->stat->Appearances}}</td>
                                    <td class="tx-12">{{ $player->stat->subIns}}</td>
                                    <td class="tx-12">{{ $player->stat->foulsCommitted}}</td>
                                    <td class="tx-12">{{ $player->stat->foulsSuffered}}</td>
                                    <td class="tx-12">{{ $player->stat->ownGoals}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive mg-t-40">

                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>offsides</th>
                                    <th>yellowCards</th>
                                    <th>redCards</th>
                                    <th>goalAssists</th>
                                    <th>shotsOnTarget</th>
                                    <th>totalShots</th>
                                    <th>totalGoals</th>
                                    <th>goalsConceded</th>
                                    <th>shotsFaced</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td class="tx-12">{{ $player->stat->offsides}}</td>
                                    <td class="tx-12">{{ $player->stat->yellowCards}}</td>
                                    <td class="tx-12">{{ $player->stat->redCards}}</td>
                                    <td class="tx-12">{{ intval($player->stat->Assists * $player->stat->MP) }}</td>
                                    <td class="tx-12">{{ $player->stat->shotsOnTarget}}</td>
                                    <td class="tx-12">{{ $player->stat->totalShots}}</td>
                                    <td class="tx-12">{{ $player->stat->Goals}}</td>
                                    <td class="tx-12">{{ $player->stat->goalsConceded}}</td>
                                    <td class="tx-12">{{ $player->stat->shotsFaced}}</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">
                        <a href="#" class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()">
                            <i class="mdi mdi-printer ml-1"></i>{{trans('index.print')}}
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
     </div>
     </div>
 @endsection
@section('js')
     <script src="{{URL::asset('Admin/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>


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
