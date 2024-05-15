@extends('site.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('site/css/comparison.css')}}" />
@endsection
@section('contact')




{{--    <section class="players" id="players" style="border-radius: 10px;">--}}
{{--        <div class="playerA">--}}
{{--            <h2 class="text-white">PLAYER A</h2>--}}
{{--            <br>--}}
{{--            <input type="text" name id placeholder="Name A:" class="players_input">--}}
{{--        </div>--}}

{{--        <div class="total_matches">--}}
{{--            <h2 class="text-white">Total matches</h2>--}}
{{--            <br>--}}

{{--            <select name="cars" id="Total_matches" class="matches_input w-100" >--}}
{{--                <option value="Total matches">Total matches</option>--}}
{{--                <option value="Total matches">Total matches</option>--}}
{{--                <option value="Total matches">Total matches</option>--}}
{{--                <option value="Total matches">Total matches</option>--}}
{{--            </select>--}}
{{--        </div>--}}

{{--        <div class="playerB">--}}
{{--            <h2 class="text-white">PLAYER B</h2>--}}
{{--            <br>--}}
{{--            <input type="text" name id placeholder="Name B:" class="players_input">--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="sec2 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12 col-xl-4">
                    <h2 class="text-white mb-4">
                        @if(App::getlocale() == 'ar')
                            {{$player1->name_ar}}
                        @else
                            {{$player1->name_en}}
                        @endif
                    </h2>
                    <div class="d-flex align-items-center  gap-3">
                        <div class="img-Cont">
                            <img src="{{$player1->photo}}" alt="">
                        </div>
                        <div>
                            <p>
                                {{trans('site/index.position')}}:
                            @if($player1->position == 0)
                                    {{trans('site/index.goalKeeper')}}
                                @elseif($player1->position == 1)
                                    {{trans('site/index.defender')}}
                                @elseif($player1->position == 2)
                                    {{trans('site/index.mid')}}
                                @elseif($player1->position == 3)
                                    {{trans('site/index.forward')}}
                                @endif
                            </p>
                            <p>{{trans('site/index.nationality')}}: {{$player1->nationality}} </p>
                            <p>{{trans('site/index.club')}}:
                                <img src="{{$player1->club->image}}" style="width: 30px ; height: 30px">
                            @if(App::getlocale() == 'ar')
                                {{$player1->club->name_ar}}
                                @else
                                    {{$player1->club->name_en}}
                                @endif

                            </p>
                            <p>{{trans('site/index.age')}}: {{$player1->stat->Age}}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-5 lastDiv">
                        <div>
                            <p>{{trans('site/index.mp')}}</p>
                            <p>{{$player1->stat->MP}}</p>
                        </div>
                        <div>
                            <p>{{trans('site/index.goals')}}</p>
                            <p>{{$player1->stat->Goals}}</p>
                        </div>
                        <div>
                            <p>{{trans('site/index.assists')}}</p>
                            <p>{{intval($player1->stat->Assists * $player1->stat->MP )}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-xl-4">
                    <div class="secondContent">
                        <div>
                            <p>{{$player1->stat->Starts}}</p>
                            <p class="s">{{trans('site/index.start')}}</p>
                            <p>{{$player2->stat->Starts}}</p>
                        </div>
                        <div>
                            <p>{{$player1->stat->Min}}</p>
                            <p class="s">{{trans('site/index.min')}}</p>
                            <p>{{$player2->stat->Min}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-xl-4">
                    <h2 class="text-white mb-4 text-end">
                        @if(App::getlocale() == 'ar')
                            {{$player2->club->name_ar}}
                        @else
                            {{$player2->club->name_en}}
                        @endif
                    </h2>
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div>
                            <p>
                                {{trans('site/index.position')}}:
                                @if($player2->position == 0)
                                    {{trans('site/index.goalKeeper')}}
                                @elseif($player2->position == 1)
                                    {{trans('site/index.defender')}}
                                @elseif($player2->position == 2)
                                    {{trans('site/index.mid')}}
                                @elseif($player2->position == 3)
                                    {{trans('site/index.forward')}}
                                @endif
                            </p>
                            <p>{{trans('site/index.nationality')}}: {{$player2->nationality}} </p>
                            <p>{{trans('site/index.club')}}:
                                <img src="{{$player2->club->image}}" style="width: 30px ; height: 30px">
                                @if(App::getLocale()=='ar')
                                    {{$player2->club->name_ar}} </p>
                            @else
                                {{$player2->club->name_en}} </p>

                            @endif
                            <p>{{trans('site/index.age')}}: {{$player2->stat->Age}}</p>
                        </div>

                        <div class="img-Cont">
                            <img src="{{$player2->photo}}" alt="">
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-5 lastDiv">
                        <div>
                            <p>{{trans('site/index.mp')}}</p>
                            <p>{{$player1->stat->MP}}</p>
                        </div>
                        <div>
                            <p>{{trans('site/index.goals')}}</p>
                            <p>{{$player1->stat->Goals}}</p>
                        </div>
                        <div>
                            <p>{{trans('site/index.assists')}}</p>
                            <p>{{intval($player1->stat->Assists * $player1->stat->MP )}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="match">
        <div class="name_a"> <img src="{{asset('site/images/comparison/Name A.png')}}" alt="name a" class="name_player"></div>
        <div class="name_b"> <img src="{{asset('site/images/comparison/Name B.png')}}" alt="name b" class="name_player"></div>
    </section>



    <!-- circles -->

    <section class="contC" style="border-radius: 10px;">
        <section class="circles">
            <div class="circle-container">
                <div class="circle">{{$player1->stat->Goals}}</div>
                <div class="text">{{trans('site/index.goals')}}</div>
            </div>

            <div class="circle-container">
                <div class="circle">{{ intval($player1->stat->SCA * $player1->stat->MP) }}</div>
                <div class="text">{{trans('stat.SCA')}}</div>
            </div>
            <div class="circle-container">
                <div class="circle">3.28</div>
                <div class="text">
                    {{trans('site/index.shot_on')}}
                    <br>{{trans('site/index.target')}}</div>
            </div>

            <div class="circle-container">
                <div class="circle">3.28</div>
                <div class="text">{{trans('site/index.shoot_on_goal')}}
                    <br>{{trans('site/index.saved')}}
                </div>
            </div>
        </section>
        <section class="circles">
            <div class="circle-container">
                <div class="circle">{{$player2->stat->Goals}}</div>
                <div class="text">{{trans('site/index.goals')}}</div>
            </div>

            <div class="circle-container">
                <div class="circle">{{ intval($player2->stat->SCA * $player2->stat->MP) }}</div>
                <div class="text">{{trans('stat.SCA')}}</div>
            </div>
            <div class="circle-container">
                <div class="circle">3.28</div>
                <div class="text">
                    {{trans('site/index.shot_on')}}
                    <br>{{trans('site/index.target')}}</div>
            </div>

            <div class="circle-container">
                <div class="circle">3.28</div>
                <div class="text">{{trans('site/index.shoot_on_goal')}}
                    <br>{{trans('site/index.saved')}}
                </div>
            </div>
        </section>
    </section>


    <!-- circles -->
    <!-- heat map -->
    <div class="ClassContianer1 " >

        <div class="total-shots" style="border-radius: 10px;">
            <h4 class="mb-4 text-center">{{trans('site/index.heatmap')}}</h4>
            <img src="{{asset('site/images/comparison/analysisPic.png')}}" alt="dataNumberOne" style="    width: 100%;
        height: 85%;">
        </div>

        <div class="score-table" style="border-radius: 10px;">
            <h4 class="noR mb-4 text-center " >{{trans('site/index.heatmap')}}</h4>
            <img src="{{asset('site/images/comparison/analysisPic.png')}}" alt="dataNumberOne" style="    width: 100%;
        height: 85%;">
        </div>
    </div>
    <!-- heat map -->


    <h2 class="Headers">{{trans('site/index.q1')}}</h2>


    <!-- tables 1 -->
    <div class="d-flex justify-content-center align-items-center " style="margin:1% 3%; ">
        <section class="w-100 row d-lg-flex justify-content-lg-evenly justify-content-sm-center px-1 ">
            <div class="table-custom-responsive col-lg-6 col-sm-12  ps-lg-0" >
                <div class="table-container p-4 w-100">
                    <table class="table-custom table-standings table-classic">
                        <thead>
                        <tr>
                            @if(App::getLocale() == 'ar')
                                <th style="text-align:right">{{ trans('site/index.stat') }}</th>
                            @else
                                <th style="text-align:left">{{ trans('site/index.stat') }}</th>
                            @endif
                            <th>{{ trans('site/index.total') }}</th>
                            <th>{{ trans('site/index.90_min') }}</th>
                         </tr>
                        </thead>
                        <tbody>


                        <tr>
                            <td><span>{{ trans('site/index.goals') }}</span></td>
                            <td class="team-inline">{{ $player1->stat->Goals }}</td>
                            <td>{{ intval(($player1->stat->Goals / $player1->stat->Min) ) }}</td>

                        </tr>
{{--                        --}}
{{--                        --}}
                        <tr>
                            <td><span>{{ trans('site/index.assists') }}</span></td>
                            <td class="team-inline">{{ $player1->stat->Assists * $player1->stat->MP }}</td>
                            <td>{{ intval(($player1->stat->Goals / $player1->stat->Min) ) }}</td>

                        </tr>

                        <tr>
                            <td><span>{{trans('index.xg')}}</span></td>
                            <td class="team-inline">{{ $player1->stat->SoT }}</td>
                            <td>N/A</td>

                        </tr>
{{--                        ##################--}}
{{--                        ##################--}}
                        <tr>
                            <td><span>{{trans('index.xa')}}</span></td>
                            <td class="team-inline">{{ $player1->stat->PasAss  }}</td>
                            <td>N/A</td>

                        </tr>
{{--                        shot--}}

                        <tr>
                            <td><span>{{trans('stat.shots')}}</span></td>
                            <td>{{intval($player1->stat->Shots * $player1->stat->MP )}}</td>
                            <td>{{intval($player1->stat->Shots /0.8 )}}</td>

                        </tr>
                        {{--                        shot--}}
                        <tr>
                            <td><span> {{trans('stat.shots_per')}}</span></td>
                            <th>{{$player1->stat->SoT_per}}% </th>

                            <td>{{ $player1->stat->PasTotCmp_per}}</td>

                        </tr>
                        {{--                        passses --}}
                        {{--                        passses --}}

                        <tr>
                            <td><span>{{trans('stat.PasTotAtt')}}</span></td>
                            <th class="team-inline">
                                {{intval($player1->stat->PasTotAtt*$player1->stat->MP)}}
                            </th>

                            <td>
                                {{ intval((($player1->stat->PasTotAtt)/90) *100)}}
                            </td>

                        </tr>
{{--                        pass--}}
{{--                        pass--}}
                        <tr>
                            <td><span>{{trans('stat.pass1')}}</span></td>
                            <td>{{ intval($player1->stat->PasTotCmp * $player1->stat->MP) }}</td>
                            <td>{{ $player1->stat->PasTotCmp_per }}</td>

                        </tr>



                        <tr>
                            <td><span>{{trans('stat.PasTotCmp_per')}}</span></td>
                            <td class="team-inline">{{$player1->stat->PasTotCmp_per}}%</td>
                            <td>N/A</td>

                        </tr>

                        <tr>
                            <td><span>{{trans('stat.Pas3rd')}}</span></td>
                            <td class="team-inline">
                                {{intval($player1->stat->Pas3rd*$player1->stat->MP)}}
                            </td>
                            <td>N/A</td>

                        </tr>

                        <tr>
                            <td><span>{{trans('stat.Crs')}}</span></td>
                            <td class="team-inline">{{
                        intval($player1->stat->PasCrs * $player1->stat->MP)  }}</td>
                            <td>{{intval($player1->stat->PasCrs /0.2)  }}</td>

                        </tr>
{{--                        Tkl--}}
                        <tr>
                            <td><span>{{trans('stat.Tkl')}}</span></td>
                            <td class="team-inline">
                                {{intval($player1->stat->Tkl*$player1->stat->MP)}}
                            </td>
                            <td>{{intval($player1->stat->Tkl*$player1->stat->MP *0.2)  }}</td>

                        </tr>
                        {{--                        Tkl--}}



                        <tr>
                            <td><span>{{trans('stat.TklWon')}}</span></td>
                            <td class="team-inline">
                                {{intval($player1->stat->TklWon * $player1->stat->MP )}}
                            </td>
                            <td>{{intval($player1->stat->TklWon * $player1->stat->MP *0.2)  }}</td>

                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>

{{--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!--}}
{{--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!--}}
            <div class="table-custom-responsive col-lg-6 col-sm-12  pe-lg-0 mt-lg-0 mt-md-2 mt-sm-2 mt-2">
                <div class="table-container p-4 w-100">
                    <table class="table-custom table-standings table-classic ">
                        <thead>
                        <tr>
                            @if(App::getLocale() == 'ar')
                                <th style="text-align:right">{{ trans('site/index.stat') }}</th>
                            @else
                                <th style="text-align:left">{{ trans('site/index.stat') }}</th>
                            @endif
                            <th>{{ trans('site/index.total') }}</th>
                            <th>{{ trans('site/index.90_min') }}</th>
                         </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td><span>{{ trans('site/index.goals') }}</span></td>
                            <td class="team-inline">{{ $player2->stat->Goals }}</td>
                            <td>{{ intval(($player2->stat->Goals / $player2->stat->Min) ) }}</td>

                        </tr>
                        {{--                        --}}
                        {{--                        --}}
                        <tr>
                            <td><span>{{ trans('site/index.assists') }}</span></td>
                            <td class="team-inline">{{ $player2->stat->Assists * $player2->stat->MP }}</td>
                            <td>{{ intval(($player2->stat->Goals / $player2->stat->Min) ) }}</td>

                        </tr>

                        <tr>
                            <td><span>{{trans('index.xg')}}</span></td>
                            <td class="team-inline">{{ $player2->stat->SoT }}</td>
                            <td>N/A</td>

                        </tr>
                        {{--                        ##################--}}

                         <tr>
                            <td><span>{{trans('index.xa')}}</span></td>
                            <td class="team-inline">{{ $player2->stat->PasAss  }}</td>
                            <td>N/A</td>

                        </tr>
                        {{--                        shot--}}
                        <tr>
                            <td><span>{{trans('stat.shots')}}</span></td>
                            <td>{{intval($player2->stat->Shots * $player2->stat->MP )}}</td>
                            <td>{{intval($player2->stat->Shots /0.8 )}}</td>

                        </tr>
                        {{--                        shot--}}
                        <tr>
                            <td><span> {{trans('stat.shots_per')}}</span></td>
                            <th>{{$player2->stat->SoT_per}} % </th>

                            <td>{{ $player2->stat->PasTotCmp_per}}</td>

                        </tr>
                        {{--                        passses --}}
                        {{--                        passses --}}

                        <tr>
                            <td><span>{{trans('stat.PasTotAtt')}}</span></td>
                            <th class="team-inline">
                                {{intval($player2->stat->PasTotAtt*$player2->stat->MP)}}
                            </th>

                            <td>
                                {{ intval((($player2->stat->PasTotAtt)/90) *100)}}
                            </td>

                        </tr>
                        {{--                        pass--}}
                        {{--                        pass--}}
                        <tr>
                            <td><span>{{trans('stat.pass1')}}</span></td>
                            <td>{{ intval($player2->stat->PasTotCmp * $player2->stat->MP) }}</td>
                            <td>{{ $player2->stat->PasTotCmp_per }}</td>

                        </tr>



                        <tr>
                            <td><span>{{trans('stat.PasTotCmp_per')}}</span></td>
                            <td class="team-inline">{{$player2->stat->PasTotCmp_per}}%</td>
                            <td>N/A</td>

                        </tr>

                        <tr>
                            <td><span>{{trans('stat.Pas3rd')}}</span></td>
                            <td class="team-inline">
                                {{intval($player2->stat->Pas3rd*$player2->stat->MP)}}
                            </td>
                            <td>N/A</td>

                        </tr>

                        <tr>
                            <td><span>{{trans('stat.Crs')}}</span></td>
                            <td class="team-inline">{{
                        intval($player2->stat->PasCrs * $player2->stat->MP)  }}</td>
                            <td>{{intval($player2->stat->PasCrs /0.2)  }}</td>

                        </tr>
                        {{--                        Tkl--}}
                        <tr>
                            <td><span>{{trans('stat.Tkl')}}</span></td>
                            <td class="team-inline">
                                {{intval($player2->stat->Tkl*$player2->stat->MP)}}
                            </td>
                            <td>{{intval($player2->stat->Tkl*$player2->stat->MP *0.2)  }}</td>

                        </tr>
                        {{--                        Tkl--}}



                        <tr>
                            <td><span>{{trans('stat.TklWon')}}</span></td>
                            <td class="team-inline">
                                {{intval($player2->stat->TklWon * $player2->stat->MP )}}
                            </td>
                            <td>{{intval($player2->stat->TklWon * $player2->stat->MP *0.2)  }}</td>

                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- end tables 1 -->

    <h2 class="Headers">{{trans('stat.Dribbling_Offside_Stats')}}</h2>

    <div class="d-flex justify-content-center align-items-center " style="margin:1% 3%; ">
        <section class="w-100 row d-lg-flex justify-content-lg-evenly justify-content-sm-center px-1 ">
            <div class="table-custom-responsive col-lg-6 col-sm-12  ps-lg-0" >
                <div class="table-container p-4 w-100">
                    <table class="table-custom table-standings table-classic " >
                        <thead>
                        <tr>
                            @if(App::getLocale() == 'ar')
                                <th style="text-align:right">{{ trans('site/index.stat') }}</th>
                            @else
                                <th style="text-align:left">{{ trans('site/index.stat') }}</th>
                            @endif
                            <th>{{ trans('site/index.total') }}</th>
                            <th>{{ trans('site/index.90_min') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td ><span> {{trans('stat.Dribbles')}}</span></td>
                            <td class="team-inline">
                                {{ intval($player1->stat->ToAtt*10)*3}}
                            </td>
                            <td>
                                {{ intval($player1->stat->ToAtt*10) }}
                            </td>
                        </tr>

                        <tr>
                            <td><span>{{trans('stat.Successful_Dribbles')}}</span></td>
                            <td class="team-inline">
                                {{ intval($player1->stat->ToSuc*10)*3}}
                            </td>
                            <td>
                                {{ intval($player1->stat->ToSuc*10)}}
                            </td>
                        </tr>
                        <tr>
                            <td><span>{{trans('stat.Successful_Dribbles_per')}}</span></td>
                            <td class="team-inline">{{ ($player1->stat->ToSuc_per)}}%</td>
                            <td>{{ ($player1->stat->ToSuc_per)}}%</td>
                        </tr>
                        <tr>
                            <td><span>{{trans('stat.Offsides')}}</span></td>
                            <td class="team-inline">
                                {{ intval($player1->stat->Off*10)*3}}
                            </td>
                            <th>{{ intval($player1->stat->Off*10) }}</th>

                        </tr>
                        <tr>
                            <td><span>
                                    {{trans('stat.CrdY')}}
                                </span></td>
                            <td class="team-inline">
                                {{intval($player1->stat->CrdY*$player1->stat->MP)}}
                            </td>
                            <th>{{intval($player1->stat->CrdY*$player1->stat->MP *0.2)  }}</th>
                        </tr>
                        <tr>
                            <td><span>
                                    {{trans('stat.CrdR')}}
                                </span></td>
                            <td class="team-inline">
                                {{intval($player1->stat->CrdR*$player1->stat->MP)}}
                            </td>
                            <th>{{intval($player1->stat->CrdR*$player1->stat->MP *0.2)  }}</th>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="table-custom-responsive col-lg-6 col-sm-12  pe-lg-0 mt-lg-0 mt-md-2 mt-sm-2 mt-2">
                <div class="table-container p-4 w-100">
                    <table class="table-custom table-standings table-classic " >
                        <thead>
                        <tr>
                            @if(App::getLocale() == 'ar')
                                <th style="text-align:right">{{ trans('site/index.stat') }}</th>
                            @else
                                <th style="text-align:left">{{ trans('site/index.stat') }}</th>
                            @endif
                            <th>{{ trans('site/index.total') }}</th>
                            <th>{{ trans('site/index.90_min') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td ><span> {{trans('stat.Dribbles')}}</span></td>
                            <td class="team-inline">
                                {{ intval($player2->stat->ToAtt*10)*3}}
                            </td>
                            <td>
                                {{ intval($player2->stat->ToAtt*10) }}
                            </td>
                        </tr>

                        <tr>
                            <td><span>{{trans('stat.Successful_Dribbles')}}</span></td>
                            <td class="team-inline">
                                {{ intval($player2->stat->ToSuc*10)*3}}
                            </td>
                            <td>
                                {{ intval($player2->stat->ToSuc*10)}}
                            </td>
                        </tr>
                        <tr>
                            <td><span>{{trans('stat.Successful_Dribbles_per')}}</span></td>
                            <td class="team-inline">{{ ($player2->stat->ToSuc_per)}}%</td>
                            <td>{{ ($player2->stat->ToSuc_per)}}%</td>
                        </tr>
                        <tr>
                            <td><span>{{trans('stat.Offsides')}}</span></td>
                            <td class="team-inline">
                                {{ intval($player2->stat->Off*10)*3}}
                            </td>
                            <th>{{ intval($player2->stat->Off*10) }}</th>

                        </tr>
                        <tr>
                            <td><span>
                                    {{trans('stat.CrdY')}}
                                </span></td>
                            <td class="team-inline">
                                {{intval($player2->stat->CrdY*$player2->stat->MP)}}
                            </td>
                            <th>{{intval($player2->stat->CrdY*$player2->stat->MP *0.2)  }}</th>
                        </tr>
                        <tr>
                            <td><span>
                                    {{trans('stat.CrdR')}}
                                </span></td>
                            <td class="team-inline">
                                {{intval($player2->stat->CrdR*$player2->stat->MP)}}
                            </td>
                            <th>{{intval($player2->stat->CrdR*$player2->stat->MP *0.2)  }}</th>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
