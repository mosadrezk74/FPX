@extends('site.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('site/css/stats.css') }}" />
@endsection
@section('title')
    @if (App::getLocale() == 'ar')
        احصائيات {{ $player->name_ar }}
    @else
        Stats {{ $player->name_en }}
    @endif
@endsection
@section('contact')
    <section class="kylian">
        <div class="container">
            <div class="data">
                <div class="image-kylian">
                    <img src="{{ $player->photo }}" style="width: 180px ; height:180px" />
                </div>
                <!--image-kylian-->
                <div class="group-data">
                    <div class="name">
                        {{-- <img src="{{ $player->photo }}" width="40px" height="40px" /> --}}
                        @if (App::getlocale() == 'ar')
                            <h1>{{ $player->name_ar }}</h1>
                        @else
                            <h1>{{ $player->name_en }}</h1>
                        @endif
                    </div>
                    <span>{{ trans('stat.club_team') }}:
                        <big>
                            <img src="{{ $player->club->image }}" width="30px" height="30px" />
                            @if (App::getlocale() == 'ar')
                                {{ $player->club->name_ar }}
                            @else
                                {{ $player->club->name_en }}
                            @endif
                        </big></span>
                    <p>{{ trans('stat.position') }}: <big>
                            @if ($player->position == 0)
                                <td>{{ trans('index.Goalkeeper') }}</td>
                            @elseif($player->position == 1)
                                <td>{{ trans('index.Defender') }}</td>
                            @elseif($player->position == 2)
                                <td>{{ trans('index.Midfielder') }}</td>
                            @elseif($player->position == 3)
                                <td>{{ trans('index.Forward') }}</td>
                            @endif
                        </big></p>
                    <span>{{ trans('stat.age') }}:
                        <big>{{ now()->diffInYears($player->age) }}({{ $player->age }})</big></span>
                </div>
                <!--group-data-->
                <div class="team">
                    <span>{{ trans('stat.national_team') }}:
                        <big>
                            {{-- <img src="images/stats/Ellipse 60.png" width="30px" height="30px" /> --}}
                            @if (App::getlocale() == 'ar')
                                {{ $player->country->name_ar }}
                            @else
                                {{ $player->country->name_en }}
                            @endif
                        </big></span>
                    <p>{{ trans('stat.preferred_foot') }}: <big>
                            @if (App::getlocale() == 'ar')
                                {{ rand(0, 1) == 1 ? 'يمني' : 'يسري' }}
                            @else
                                {{ rand(0, 1) == 1 ? 'Right' : 'Left' }}
                            @endif
                        </big></p>
                    <p>{{ trans('stat.height') }}: <big>{{ $player->height }}cm</big></p>
                    <p>{{ trans('stat.weight') }}: <big>{{ $player->weight }}kg</big></p>
                </div>
            </div>
        </div>
    </section>

    <div class="tabs container p-0">
        <button class="tablinks" onclick="openTab(event, 'tab1')">{{ trans('stat.general') }}</button>
        <button class="tablinks" onclick="openTab(event, 'tab2')">
            {{ trans('stat.goals_xg_shots') }}
        </button>
        <button class="tablinks" onclick="openTab(event, 'tab3')">
            {{ trans('stat.assists_passes') }}
        </button>
        <button class="tablinks" onclick="openTab(event, 'tab4')">
            {{ trans('stat.cards_fouls') }}
        </button>
        <button class="tablinks" onclick="openTab(event, 'tab5')">
            {{ trans('stat.defending') }}
        </button>
        <button class="tablinks" onclick="openTab(event, 'tab6')">
            {{ trans('stat.penalties') }}

        </button>
    </div>

    <div id="tab1" class="tabcontent py-5 container">
        <div class="content mb-5">
            <div class="hour">
                @php
                    $rating = [5.5, 6, 6.5, 7, 7.5, 8, 9, 10, 8.5, 9.5];
                    $random_key = array_rand($rating);

                    $random_number = $rating[$random_key];
                @endphp
                <span>{{ $random_number }}</span>
            </div>
            <div class="average">
                <p class="mb-0">
                    @if (App::getLocale() == 'ar')
                        متوسط التقييم بالنسبه للاعبي الدوري المصري : {{ $rank }} / {{ $count }} لاعب
                    @else
                        Average rating for Egyptian League players : {{ $rank }}nd / {{ $count }} Players
                    @endif
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="maps">
                    <h1>{{ trans('stat.heatmap') }}</h1>
                    <div class="heatmap">
                        <img src="{{ asset('Dashboard/heat.png') }}" style="width: 180px ; height:150px" />
                    </div>
                    <!--heatmap-->
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="strengths">
                    <div class="content">
                        <div class="outstanding">
                            <h3 style="color: rgba(98, 182, 44, 1)">{{ trans('stat.strengths') }}</h3>
                            @if ($player->position == 0)
                                <h3>{{ trans('stat.GK_diving') }}</h3>
                                <h3>{{ trans('stat.GK_reflexes') }}</h3>
                                <h3>{{ trans('stat.GK_positioning') }}</h3>
                            @elseif ($player->position == 1)
                                <h3>{{ trans('stat.Agility') }}</h3>
                                <h3>{{ trans('stat.Balance') }}</h3>
                                <h3>{{ trans('stat.Physical_capacity') }}</h3>
                                <h3>{{ trans('stat.Sprint_speed') }}</h3>
                            @elseif ($player->position == 2)
                                <h3>{{ trans('stat.Short_passing') }}</h3>
                                <h3>{{ trans('stat.Long_shots') }}</h3>
                                <h3>{{ trans('stat.Ball_control') }}</h3>
                                <h3>{{ trans('stat.Dribbles') }}</h3>
                                <h3>{{ trans('stat.FK_accuracy') }}</h3>
                            @elseif ($player->position == 3)
                                <h3>{{ trans('stat.Long_shots') }}</h3>
                                <h3>{{ trans('stat.Sprint_speed') }}</h3>
                                <h3>{{ trans('stat.Finishing') }}</h3>
                                <h3>{{ trans('stat.Heading_accuracy') }}</h3>
                            @endif
                            <h3 style="color: red">{{ trans('stat.weaknesses') }}</h3>
                            <h3 style="margin-top: 20px; font-size: 22px">
                                {{ trans('stat.no_outstanding_weaknesses') }}
                            </h3>
                        </div>
                        <!--outstanding-->

                        <div class="images">
                            <img src="{{ asset('site/images/stats/b74ec1e39b010929a816cf1ef3994f78 1.png') }}" />
                        </div>
                        <!--images-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tab2" class="tabcontent container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ trans('stat.goals_xg_shots') }}</th>
                    <th scope="col">{{ trans('stat.total') }}</th>
                    <th scope="col">{{ trans('stat.90_min') }}</th>
                    <th scope="col">{{ trans('stat.per') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ trans('stat.goals_scored') }}</th>
                    <td>{{ $player->stat->Goals }}</td>
                    <td>{{ $player->stat->Goals / $player->stat->MP }}</td>
                    <td>{{ rand(60, 90) }}%</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.goal_involvement') }}</th>
                    <td>{{ intval($player->stat->Goals + $player->stat->Assists * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->Assists }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.goals_at_home') }}</th>
                    <td>{{ $player->stat->Goals * 0.5 }}</td>
                    <td>{{ ($player->stat->Goals * 0.5) / 100 }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.goals_at_away') }}</th>
                    <td>{{ $player->stat->Goals * 0.5 }}</td>
                    <td>{{ ($player->stat->Goals * 0.5) / 100 }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.expected_goals') }}</th>
                    <td>{{ $player->stat->SoT }}</td>
                    <td>N/A</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.non_penalty_xg') }}</th>
                    <td>{{ $player->stat->GCA }}</td>
                    <td>N/A</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.hat_tricks') }}</th>
                    <td>{{ intval($player->stat->Goals / 8) }}</td>
                    <td>N/A</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>

                <tr>
                    <th scope="row">{{ trans('stat.minutes_per_goal') }}</th>

                    <td>
                        @if ($player->stat->MP > 0 && $player->stat->Goals > 0)
                            {{ intval($player->stat->Min / $player->stat->MP / $player->stat->Goals) }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>N/A</td>
                    <td>{{ rand(60, 90) }}%</td>
                </tr>


            </tbody>
        </table>
    </div>

    <div id="tab3" class="tabcontent container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ trans('stat.assists_passes') }}</th>
                    <th scope="col">{{ trans('stat.total') }}</th>
                    <th scope="col">{{ trans('stat.90_min') }}</th>
                    <th scope="col">{{ trans('stat.per') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ trans('stat.assists') }}</th>
                    <td>{{ intval($player->stat->Assists * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->Assists }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.expected_assists') }}</th>
                    <td>{{ $player->stat->PasAss }}</td>
                    <td>N/A</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.expected_assists') }}</th>
                    <td>{{ intval($player->stat->PasTotAtt * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->PasTotAtt }}</td>

                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.successful_passes') }}</th>

                    <td>{{ intval($player->stat->PasTotCmp * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->PasTotCmp }}</td>

                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.pass_completion_rate') }}</th>
                    <td>{{ $player->stat->PasTotCmp_per }}%</td>
                    <td>N/A</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.key_passes') }}</th>
                    <td>{{ intval($player->stat->Pas3rd * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->Pas3rd }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.crosses') }}</th>
                    <td>{{ intval($player->stat->Crs * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->Crs }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.successful_crosses') }}</th>
                    <td>{{ intval($player->stat->CrsPA * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->CrsPA }}</td>
                    <td>{{ rand(60, 90) }}%</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.cross_completion_rate') }}</th>
                    <td>{{ $player->stat->CrsPA * 100 }}% </td>
                    <td>N/A</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.minutes_per_assist') }}</th>
                    <td>
                        @if ($player->stat->MP > 0 && $player->stat->Assists > 0)
                            {{ intval($player->stat->Min / $player->stat->MP / $player->stat->Assists) }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>N/A</td>
                    <td>{{ rand(60, 90) }}%</td>
                </tr>


            </tbody>
        </table>
    </div>

    <div id="tab4" class="tabcontent container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ trans('stat.cards_fouls') }}</th>
                    <th scope="col">{{ trans('stat.total') }}</th>
                    <th scope="col">{{ trans('stat.90_min') }}</th>
                    <th scope="col">{{ trans('stat.per') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">&#129000;{{ trans('stat.yellow_cards') }}</th>
                    <td>{{ intval($player->stat->CrdY * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->CrdY }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">&#128997;{{ trans('stat.red_cards') }}</th>
                    <td>{{ intval($player->stat->CrdR * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->CrdR }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">&#129000;&#128997;{{ trans('stat.total_cards') }}</th>
                    <td>{{ intval($player->stat->CrdR * $player->stat->MP + $player->stat->CrdY * $player->stat->MP) }}
                    </td>
                    <td>{{ $player->stat->CrdR + $player->stat->CrdY }}

                    <td>{{ rand(60, 90) }}%</td>

                </tr>


                <tr>
                    <th scope="row">{{ trans('stat.fouls_committed') }}</th>
                    <td>{{ intval($player->stat->Fls * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->Fls }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.fouled_against') }}</th>
                    <td>{{ intval($player->stat->Err * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->Err }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>



            </tbody>
        </table>
    </div>

    <div id="tab5" class="tabcontent container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ trans('stat.def') }}</th>
                    <th scope="col">{{ trans('stat.total') }}</th>
                    <th scope="col">{{ trans('stat.90_min') }}</th>
                    <th scope="col">{{ trans('stat.per') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ trans('stat.goals_conceded') }}</th>
                    <td>{{ $player->stat->OG * $player->stat->MP }}</td>
                    <td>{{ $player->stat->OG }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.minutes_per_goal_conceded') }}</th>
                    <td>{{ rand(70, 90) }}</td>
                    <td>{{ rand(70, 90) }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.clean_sheets') }}</th>
                    <td>{{ rand(8, 14) }}</td>
                    <td>N/A</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.tackles') }}</th>
                    <td>{{ intval($player->stat->Tkl * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->Tkl }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.interceptions') }}</th>
                    <td>{{ intval($player->stat->Tkl_Int * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->Tkl_Int }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.aerial_duels_won') }}</th>
                    <td>{{ intval($player->stat->AerWon * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->AerWon }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.aerial_duels_lost') }}</th>
                    <td>{{ intval($player->stat->AerLost * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->AerLost }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>

                <tr>
                    <th scope="row">{{ trans('stat.dribbled_past') }}</th>
                    <td>{{ $player->stat->ScaDrib * $player->stat->MP }}</td>
                    <td>{{ $player->stat->ScaDrib }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.clearances') }}</th>
                    <td>{{ intval($player->stat->Clr * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->Clr }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.shots_blocked') }}</th>
                    <td>{{ intval($player->stat->Blocks * $player->stat->MP) }}</td>

                    <td>{{ $player->stat->Blocks }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.Off') }}</th>
                    <td>{{ intval($player->stat->Off * $player->stat->MP) }}</td>
                    <td>{{ $player->stat->Off }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>


            </tbody>
        </table>
    </div>
    <div id="tab6" class="tabcontent container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Penalties</th>
                    <th scope="col">This Season</th>
                    <th scope="col">Career</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ trans('stat.penalty_conversion_rate') }}</th>
                    <td>{{ $player->stat->Pkatt * $player->stat->MP }}%</td>
                    <td>{{ rand(60, 90) }}%</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.penalties_taken') }}</th>
                    <td>{{ rand(3, 8) }}</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.PKatt') }}</th>
                    <td>{{ intval($player->stat->Pkatt * $player->stat->MP) }}</td>
                    <td>{{ rand(60, 90) }}%</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('stat.ShoPK') }}</th>
                    <td>{{ intval($player->stat->ShoPK * $player->stat->MP) }}</td>
                    <td>{{ rand(60, 90) }}%</td>

                </tr>




            </tbody>
        </table>
    </div>
@endsection
