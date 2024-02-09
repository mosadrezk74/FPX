@extends('Dashboard.layouts.master')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .bg-success {
        background-color: #00ff00;
        padding: 2px 5px;
        border-radius: 3px;
    }

</style>
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
	<!-- breadcrumb -->
@endsection
<!-- breadcrumb -->

	@section('content')
		@include('Dashboard.Clubs.messages_alert')


		<!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex flex-column   text-center">
                        <div class="position-relative">
                            <img alt="" src="{{ asset('uploads/players/'. $player->photo) }}"  width="250" height="250" class="brround img-fluid">
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
                                 <hr class="mg-y-30">
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
                                    <th scope="row">Nationality</th>
                                    <td>{{$player->nationality}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Average Rating</th>
                                    <th>
                                <p class="card-text">
                                    @if(rand() > 5)
                                    <span class="bg-success">{{rand(5,10)}}</span>
                                    @elseif(rand()<5)
                                        <span class="bg-danger">{{rand(0,4)}}</span>
                                    @endif
                                </p>
                                    </th>

                                </tr>

                                </tbody>
                            </table>
                            </div>

                            <hr class="mg-y-30">
                            <a href="{{ route('stats.print', $player->id) }}" class="btn btn-primary">{{trans('index.print')}}</a>
                            <a href="{{ route('compare', $player->id) }}" class="btn btn-primary">مقارنة</a>
{{--                            <a href="{{ route('players.follow', $player->id) }}" class="btn btn-primary">متابعــة</a>--}}

                        </div>
                    </div>
                 </div>
            </div>
        </div>


        <div class="col-lg">

                <div class="card">
                    <div class="card-body">
                        <div class="tabs-menu ">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                                <li class="active">
                                    <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">General Stats</span> </a>
                                </li>
                                <li class="">
                                    <a href="#attack" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">Attack</span> </a>
                                </li>
                                <li class="">
                                    <a href="#team_play" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">team_play</span> </a>
                                </li>
                                <li class="">
                                    <a href="#discipline" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">Discipline</span> </a>
                                </li>
                                <li class="">
                                    <a href="#defence" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">Defence</span> </a>
                                </li>


                            </ul>
                        </div>
                        <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                            <div class="tab-pane active" id="home">
                                <h4 class="tx-15 text-uppercase mb-3">Stats</h4>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3">

                                    <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class=" text-white">{{$player->stat->Appearances}}</h1>
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{trans('index.appearances')}}</h1>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add more cards here with the same structure -->
                                    <div class="col-lg-3 col-md-3">

                                    <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class=" text-white">{{$player->stat->totalGoals}}</h1>
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{trans('index.goal')}}</h1>

                                            </div>
                                        </div>
                                    </div>




                                    <!-- Add more cards here with the same structure -->
                                    <div class="col-lg-3 col-md-3">
                                        <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class=" text-white">{{$player->stat->goalAssists}}</h1>
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{trans('index.assist')}}</h1>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add more cards here with the same structure -->
                                    <div class="col-lg-3 col-md-3">
                                        <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class=" text-white">{{rand(500,1000)}}</h1>
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">الباصات</h1>

                                            </div>
                                        </div>
                                    </div>
{{--                                    <hr>--}}
{{--                                    <hr>--}}
                                    <hr>
                                    <div class="col-lg-3 col-md-3">
                                        <hr>

                                        <div class="card bg-warning-gradient text-center">

                                            <div class="card-body">
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">XG</h1>
                                                <h1 class="text-white">{{ mt_rand(50, 100) / 100 }}</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3">
                                        <hr>

                                        <div class="card bg-warning-gradient text-center">

                                            <div class="card-body">
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">XA</h1>
                                                <h1 class="text-white">{{ mt_rand(30, 80) / 100 }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <hr>

                                        <div class="card bg-warning-gradient text-center">

                                            <div class="card-body">
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">X(G+A)</h1>
                                                <h1 class="text-white">{{ mt_rand(30, 70) / 100 }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <hr>

                                        <div class="card bg-warning-gradient text-center">

                                            <div class="card-body">
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">GOALS PER MATCH	</h1>
                                                <h1 class="text-white">{{ mt_rand(50, 100) / 100 }}</h1>

                                            </div>
                                        </div>
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
                                                <div class="table-responsive hoverable-table">
                                                    <table id="example-delete" class="table text-md-nowrap "   style="text-align: center">
                                                        <thead>
                                                        <tr>
                                                            <th>Goals</th>
                                                            <th>Goals per match</th>
                                                            <th>Headed goals</th>
                                                            <th>Penalties scored</th>
                                                            <th>Shots on target</th>
                                                         </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{$player->stat->totalGoals}}</td>
                                                            <td>{{ mt_rand(100, 150) / 100 }}</td>
                                                            <td>{{rand(1,10)}}</td>
                                                            <td>{{rand(5,10)}}</td>
                                                            <td>{{$player->stat->totalShots}}</td>
                                                         </tr>

                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="card-title mg-b-0">Team Play</h4>
                                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive hoverable-table">
                                                    <table id="example-delete" class="table text-md-nowrap" style="text-align: center">
                                                        <thead>
                                                        <tr>
                                                            <th>Assists</th>
                                                            <th>Passes</th>
                                                            <th>Passes per match</th>
                                                            <th>Big Chances Created</th>
                                                            <th>Crosses</th>
                                                         </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{$player->stat->goalAssists}}</td>
                                                            <td>{{rand(500,1000)}}</td>
                                                            <td>{{ mt_rand(100, 150) / 100 }}</td>
                                                            <td>{{$player->stat->goalsConceded}}</td>
                                                            <td>{{$player->stat->shotsOnTarget}}</td>
                                                         </tr>

                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <div class="col-xl-12" >
                                        <div class="card">
                                            <div class="card-header pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="card-title mg-b-0">Discipline</h4>
                                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive hoverable-table">
                                                    <table id="example-delete" class="table text-md-nowrap" style="text-align: center">
                                                        <thead>
                                                        <tr>
                                                            <th>Yellow cards </th>
                                                            <th>Red  cards</th>
                                                            <th>Fouls</th>
                                                            <th>Offsides</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{$player->stat->yellowCards}}</td>
                                                            <td>{{$player->stat->redCards}}</td>
                                                            <td>{{$player->stat->foulsSuffered}}</td>
                                                            <td>{{$player->stat->offsides}}</td>

                                                         </tr>

                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="card-title mg-b-0">Defence</h4>
                                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive hoverable-table">
                                                    <table id="example-delete" class="table text-md-nowrap" style="text-align: center">
                                                        <thead>
                                                        <tr>
                                                            <th>Tackles </th>
                                                            <th>Blocked shots</th>
                                                            <th>Interceptions</th>
                                                            <th>Clearances</th>
                                                            <th>Headed Clearance</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{$player->stat->average_play_timemin}}</td>
                                                            <td>{{ mt_rand(100, 150)  }}</td>
                                                            <td>{{rand(100,500)}}</td>
                                                            <td>{{rand(55,100)}}</td>
                                                            <td>{{rand(20,90)}}</td>
                                                        </tr>

                                                        </tbody>

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

                                            <div class="card bg-warning-gradient text-center">

                                                <div class="card-body">
                                                    <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">XG</h1>
                                                    <h1 class="text-white">{{ mt_rand(50, 100) / 100 }}</h1>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3">
                                            <hr>

                                            <div class="card bg-warning-gradient text-center">

                                                <div class="card-body">
                                                    <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">XA</h1>
                                                    <h1 class="text-white">{{ mt_rand(30, 80) / 100 }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <hr>

                                            <div class="card bg-warning-gradient text-center">

                                                <div class="card-body">
                                                    <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">X(G+A)</h1>
                                                    <h1 class="text-white">{{ mt_rand(30, 70) / 100 }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <hr>

                                            <div class="card bg-warning-gradient text-center">

                                                <div class="card-body">
                                                    <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">GOALS PER MATCH	</h1>
                                                    <h1 class="text-white">{{ mt_rand(50, 100) / 100 }}</h1>

                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="team_play">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/7.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/8.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/9.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/10.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/6.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/5.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="discipline">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/7.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/8.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/9.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/10.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/6.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/5.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="defence">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/7.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/8.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/9.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/10.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/6.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/5.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
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
