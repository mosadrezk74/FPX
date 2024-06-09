@extends('Dashboard.layouts.master')

@section('title')
    {{trans('index.gen_info')}}
@stop




@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">

                <h4 class="content-title mb-0 my-auto">{{trans('index.gen_info')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
				</span>




            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="simple-head">
                    <th width="20%">
                        <div class="bg-white h-100 w-100"></div>
                    </th>
                    <th width="20%">
                        <div class="mb-2">
                            <div class="align-items-center  ">
                                <img src="{{$player1->photo}}" style="width:80px;height: 80px" >

                                <span class="text-center ">
                                    {{$player1->name_ar}}
                                </span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-sm btn-primary" href="{{route('stats.show', $player1->id)}}">
                                    {{trans('dash.your_view')}}

                                </a>
                            </div>


                        </div>
                    </th>
                    <th width="20%">
                        <div class="mb-2">
                            <div class="align-items-center  ">
                                <img src="{{$player2->photo}}" style="width:80px;height: 80px" >

                                <span class="text-center ">
                                    {{$player2->name_ar}}
                                </span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">


                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="btn btn-sm btn-primary" href="{{route('stats.show', $player2->id)}}">
                                        {{trans('dash.view_player')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"> {{trans('dash.club')}}</th>
                    <td class="base-item">
                        <img src="{{$player1->club->image}}" style="width:30px;height: 30px" >
                        @if(App::getlocale() == 'ar')
                            {{$player1->club->name_ar}}
                        @else
                            {{$player1->club->name_en}}
                        @endif


                    </td>
                    <td>
                        <img src="{{$player2->club->image}}" style="width:30px;height: 30px" >
                        @if(App::getlocale() == 'ar')
                            {{$player2->club->name_ar}}
                        @else
                            {{$player2->club->name_en}}
                        @endif
                    </td>

                </tr>
                <tr>
                    <th scope="row"> {{trans('dash.position')}}</th>
                    <td class="base-item">
                        @if($player1->position == 0)
                            {{trans('site/index.goalKeeper')}}
                        @elseif($player1->position == 1)
                            {{trans('site/index.defender')}}
                        @elseif($player1->position == 2)
                            {{trans('site/index.mid')}}
                        @elseif($player1->position == 3)
                            {{trans('site/index.forward')}}
                        @endif</td>
                    <td>
                        @if($player2->position == 0)
                            {{trans('site/index.goalKeeper')}}
                        @elseif($player2->position == 1)
                            {{trans('site/index.defender')}}
                        @elseif($player2->position == 2)
                            {{trans('site/index.mid')}}
                        @elseif($player2->position == 3)
                            {{trans('site/index.forward')}}
                        @endif</td>

                </tr>

                {{--
                --}}

                <tr>
                    <th scope="row">{{trans('site/index.nationality')}}</th>
                    <td class="base-item">
                        @if(App::getlocale() == 'ar')
                            {{$player1->country->name_ar}}
                        @else
                            {{$player1->country->name_en}}
                        @endif
                    </td>

                    <td class="base-item">
                        @if(App::getlocale() == 'ar')
                            {{$player2->country->name_ar}}
                        @else
                            {{$player2->country->name_en}}
                        @endif
                    </td>
                </tr>

                {{--
                --}}
                <tr>
                    <th scope="row">{{trans('stat.age')}}</th>
                    <td class="base-item">
                        {{$player1->stat->Age}}
                    </td>

                    <td>
                        {{$player2->stat->Age}}
                    </td>
                </tr>

                <tr>
                    <th scope="row"> {{trans('dash.rating')}}</th>
                    <td class="base-item">

                        <p class="card-text">
                            @if(rand() > 5)
                                <span class="bg-success text-white">{{rand(7,10)}}</span>
                            @elseif(rand()<5)
                                <span class="bg-danger text-white">{{rand(0,4)}}</span>
                            @endif
                        </p>

                    </td>
                    <td>

                        <p class="card-text">
                            @if(rand() > 5)
                                <span class="bg-success text-white">{{rand(7,10)}}</span>
                            @elseif(rand()<5)
                                <span class="bg-danger text-white">{{rand(0,4)}}</span>
                            @endif
                        </p>

                    </td>
                </tr>
                <tr>
                    <th scope="row">{{trans('dash.MP')}}</th>
                    <td class="base-item">
                        @if($player1->stat->MP > $player2->stat->MP)
                            <strong>{{$player1->stat->MP}}</strong>
                        @else
                            {{$player1->stat->MP}}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->MP > $player1->stat->MP)
                            <strong>{{$player2->stat->MP}}</strong>
                        @else
                            {{$player2->stat->MP}}
                        @endif
                    </td>
                </tr>


                <tr>
                    <th scope="row">{{trans('stat.Starts')}}</th>
                    <td class="base-item">
                        @if($player1->stat->Starts > $player2->stat->Starts)
                            <strong>{{$player1->stat->Starts}}</strong>
                        @else
                            {{$player1->stat->Starts}}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->Starts > $player1->stat->Starts)
                            <strong>{{$player2->stat->Starts}}</strong>
                        @else
                            {{$player2->stat->Starts}}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th scope="row">{{trans('dash.Goals')}}</th>
                    <td class="base-item">
                        @if($player1->stat->Goals > $player2->stat->Goals)
                            <strong>{{$player1->stat->Goals}}</strong>
                        @else
                            {{$player1->stat->Goals}}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->Goals > $player1->stat->Goals)
                            <strong>{{$player2->stat->Goals}}</strong>
                        @else
                            {{$player2->stat->Goals}}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th scope="row">{{trans('dash.Assists')}}</th>
                    <td class="base-item">
                        @if($player1->stat->Assists * $player1->stat->MP > $player2->stat->Assists * $player2->stat->MP)
                            <strong>{{intval($player1->stat->Assists * $player1->stat->MP)}}</strong>
                        @else
                            {{ intval($player1->stat->Assists * $player1->stat->MP) }}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->Assists * $player2->stat->MP > $player1->stat->Assists * $player1->stat->MP)
                            <strong>{{intval($player2->stat->Assists * $player2->stat->MP)}}</strong>
                        @else
                            {{ intval($player2->stat->Assists * $player2->stat->MP) }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th scope="row">XG</th>
                    <td class="base-item">
                        @if($player1->stat->SoT > $player2->stat->SoT)
                            <strong>{{$player1->stat->SoT}}</strong>
                        @else
                            {{$player1->stat->SoT}}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->SoT > $player1->stat->SoT)
                            <strong>{{$player2->stat->SoT}}</strong>
                        @else
                            {{$player2->stat->SoT}}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th scope="row">XA</th>
                    <td class="base-item">
                        @if($player1->stat->PasAss > $player2->stat->PasAss)
                            <strong>{{$player1->stat->PasAss}}</strong>
                        @else
                            {{$player1->stat->PasAss}}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->PasAss > $player1->stat->PasAss)
                            <strong>{{$player2->stat->PasAss}}</strong>
                        @else
                            {{$player2->stat->PasAss}}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th scope="row">{{trans('stat.shots')}}</th>
                    <td class="base-item">
                        @if($player1->stat->Shots * $player1->stat->MP > $player2->stat->Shots * $player2->stat->MP)
                            <strong>{{intval($player1->stat->Shots * $player1->stat->MP)}}</strong>
                        @else
                            {{intval($player1->stat->Shots * $player1->stat->MP)}}
                        @endif
                    </td>
                    <td class="base-item">
                        @if($player2->stat->Shots * $player2->stat->MP > $player1->stat->Shots * $player1->stat->MP)
                            <strong>{{intval($player2->stat->Shots * $player2->stat->MP)}}</strong>
                        @else
                            {{intval($player2->stat->Shots * $player2->stat->MP)}}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th scope="row">{{trans('stat.pass1')}}</th>
                    <td class="base-item">
                        @if($player1->stat->PasTotCmp > $player2->stat->PasTotCmp)
                            <strong>{{intval($player1->stat->PasTotCmp * $player1->stat->MP)}}</strong>
                        @else
                            {{ intval($player1->stat->PasTotCmp * $player1->stat->MP) }}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->PasTotCmp > $player1->stat->PasTotCmp)
                            <strong>{{intval($player2->stat->PasTotCmp * $player2->stat->MP)}}</strong>
                        @else
                            {{ intval($player2->stat->PasTotCmp * $player2->stat->MP) }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th scope="row">{{trans('stat.PasTotCmp_per')}}</th>
                    <td class="base-item">
                        @if($player1->stat->PasTotCmp_per > $player2->stat->PasTotCmp_per)
                            <strong>{{$player1->stat->PasTotCmp_per}}%</strong>
                        @else
                            {{$player1->stat->PasTotCmp_per}}%
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->PasTotCmp_per > $player1->stat->PasTotCmp_per)
                            <strong>{{$player2->stat->PasTotCmp_per}}%</strong>
                        @else
                            {{$player2->stat->PasTotCmp_per}}%
                        @endif
                    </td>
                </tr>

                <tr>
                    <th scope="row">{{trans('stat.Crs')}}</th>
                    <td class="base-item">
                        @if($player1->stat->Crs > $player2->stat->Crs)
                            <strong>{{intval($player1->stat->Crs * $player1->stat->MP)}}</strong>
                        @else
                            {{ intval($player1->stat->Crs * $player1->stat->MP) }}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->Crs > $player1->stat->Crs)
                            <strong>{{intval($player2->stat->Crs * $player2->stat->MP)}}</strong>
                        @else
                            {{ intval($player2->stat->Crs * $player2->stat->MP) }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th scope="row">{{trans('stat.Tkl')}}</th>
                    <td class="base-item">
                        @if($player1->stat->TklWon > $player2->stat->TklWon)
                            <strong>{{intval($player1->stat->TklWon * $player1->stat->MP)}}</strong>
                        @else
                            {{ intval($player1->stat->TklWon * $player1->stat->MP) }}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->TklWon > $player1->stat->TklWon)
                            <strong>{{intval($player2->stat->TklWon * $player2->stat->MP)}}</strong>
                        @else
                            {{ intval($player2->stat->TklWon * $player2->stat->MP) }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th scope="row">{{trans('stat.Clr')}}</th>
                    <td class="base-item">
                        @if($player1->stat->Clr > $player2->stat->Clr)
                            <strong>{{intval($player1->stat->Clr * $player1->stat->MP)}}</strong>
                        @else
                            {{ intval($player1->stat->Clr * $player1->stat->MP) }}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->Clr > $player1->stat->Clr)
                            <strong>{{intval($player2->stat->Clr * $player2->stat->MP)}}</strong>
                        @else
                            {{ intval($player2->stat->Clr * $player2->stat->MP) }}
                        @endif
                    </td>
                </tr>



                {{----}}

                <tr>
                    <th scope="row">{{trans('stat.ToAtt')}}</th>
                    <td class="base-item">
                        @if($player1->stat->ToAtt > $player2->stat->ToAtt)
                            <strong>{{intval($player1->stat->ToAtt * $player1->stat->MP)}}</strong>
                        @else
                            {{ intval($player1->stat->ToAtt * $player1->stat->MP) }}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->ToAtt > $player1->stat->Touches)
                            <strong>{{intval($player2->stat->ToAtt * $player2->stat->MP)}}</strong>
                        @else
                            {{ intval($player2->stat->ToAtt * $player2->stat->MP) }}
                        @endif
                    </td>
                </tr>

                {{----}}

                <tr>
                    <th scope="row">{{trans('stat.ToSuc')}}</th>
                    <td class="base-item">
                        @if($player1->stat->ToSuc > $player2->stat->ToSuc)
                            <strong>{{intval($player1->stat->ToSuc * $player1->stat->MP)}}</strong>
                        @else
                            {{ intval($player1->stat->ToSuc * $player1->stat->MP) }}
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->ToSuc > $player1->stat->ToSuc)
                            <strong>{{intval($player2->stat->ToSuc * $player2->stat->MP)}}</strong>
                        @else
                            {{ intval($player2->stat->ToSuc * $player2->stat->MP) }}
                        @endif
                    </td>
                </tr>


                <tr>
                    <th scope="row">{{trans('stat.ToSuc_per')}}</th>
                    <td class="base-item">
                        @if($player1->stat->ToSuc_per > $player2->stat->ToSuc_per)
                            <strong>{{$player1->stat->ToSuc_per}}%</strong>
                        @else
                            {{$player1->stat->ToSuc_per}}%
                        @endif
                    </td>
                    <td>
                        @if($player2->stat->ToSuc_per > $player1->stat->ToSuc_per)
                            <strong>{{$player2->stat->ToSuc_per}}%</strong>
                        @else
                            {{$player2->stat->ToSuc_per}}%
                        @endif
                    </td>
                </tr>










                </tbody>


            </table>
        </div>
    </div>


@endsection
@section('js')


@endsection
