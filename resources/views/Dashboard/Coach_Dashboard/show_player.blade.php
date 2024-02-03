@extends('Dashboard.layouts.master')

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
        <div class="row row-sm">
            <div class="col-lg-4">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="pl-0">
                            <div class="main-profile-overview">
                                <div class="main-img-user profile-user">
                                    <img alt="" src="{{ asset('uploads/players/'. $player->photo) }}" class="brround "><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                                </div>
                                <div class="d-flex justify-content-between mg-b-20">
                                    <div>
                                        <h5 class="main-profile-name">{{$player->name_ar}}</h5>
                                        <p class="main-profile-name-text">{{$player->club->name_ar}}</p>
                                    </div>
                                </div>
                                <hr>
                                <p class="col-sm-6 mb-0 font-weight-bold">Personal Details</p>
                                <hr>
                                <div class="row">



                                    <div class="col-md-4 col mb20">
                                        <h6 class="text-small text-muted mb-0">Age</h6>
                                        <h5>{{$player->stat->Age}}</h5>
                                    </div>

                                    <div class="col-md-4 col mb20">
                                        <h6 class="text-small text-muted mb-0">Height</h6>
                                        <h5>{{$player->stat->Heightcm}}</h5>
                                    </div>

                                    <div class="col-md-4 col mb20">
                                        <h6 class="text-small text-muted mb-0">Nationality</h6>
                                        <h5>{{$player->nationality}}</h5>
                                    </div>

{{--                                    <div class="col-md-4 col mb20">--}}
{{--                                        <h6 class="text-small text-muted mb-0">Position</h6>--}}
{{--                                        @if($player->position == 0)--}}
{{--                                            <h5>{{trans('index.Goalkeeper')}}</h5>--}}
{{--                                        @elseif($player->position == 1)--}}
{{--                                            <h5 >{{trans('index.Defender')}}</h5>--}}
{{--                                        @elseif($player->position == 2)--}}
{{--                                            <h5 >{{trans('index.Midfielder')}}</h5>--}}
{{--                                        @elseif($player->position == 3)--}}
{{--                                            <h5 >{{trans('index.Forward')}}</h5>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}


                                </div>
                                <hr>

                                <p class="col-sm-6 mb-0 font-weight-bold">League Record</p>
                                <hr>
                                <div class="row">

                                    <div class="col-md-4 col mb20">
                                        <h6 class="text-small text-muted mb-0">Appearances</h6>
                                        <h5>{{$player->stat->Appearances}}</h5>
                                    </div>

                                    <div class="col-md-4 col mb20">
                                        <h6 class="text-small text-muted mb-0">Gaols</h6>
                                        <h5>{{$player->stat->totalGoals}}</h5>
                                    </div>


                                    <div class="col-md-4 col mb20">
                                        <h6 class="text-small text-muted mb-0">Assists</h6>
                                        <h5>{{$player->stat->goalAssists}}</h5>
                                    </div>


                                </div>
                                <hr class="mg-y-30">
                                <a href="{{ route('stats.print', $player->id) }}" class="btn btn-primary">{{trans('index.print')}}</a>
                                <a href="{{ route('stats.print', $player->id) }}" class="btn btn-primary">مقارنة</a>
                                <a href="{{ route('stats.print', $player->id) }}" class="btn btn-primary">أعجبني</a>

                            </div><!-- main-profile-overview -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <div class="tabs-menu ">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                                <li class="active">
                                    <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">ABOUT ME</span> </a>
                                </li>
                                <li class="">
                                    <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">GALLERY</span> </a>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                            <div class="tab-pane active" id="home">
                                <h4 class="tx-15 text-uppercase mb-3">Stats</h4>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{trans('index.appearances')}}</h1>
                                                <h1 class=" text-white">{{$player->stat->Appearances}}</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add more cards here with the same structure -->
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{trans('index.goal')}}</h1>
                                                <h1 class=" text-white">{{$player->stat->totalGoals}}</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add more cards here with the same structure -->
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">{{trans('index.assist')}}</h1>
                                                <h1 class=" text-white">{{$player->stat->goalAssists}}</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add more cards here with the same structure -->
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card bg-primary">
                                            <div class="card-body text-center">
                                                <h1 class="tx-13 tx-white-8 mb-3" style="font-weight: bold;">الباصات</h1>
                                                <h1 class=" text-white">{{rand(500,1000)}}</h1>
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
                            <div class="tab-pane" id="profile">
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
