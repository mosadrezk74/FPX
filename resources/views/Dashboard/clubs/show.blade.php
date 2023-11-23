@extends('Dashboard.layouts.master')

@section('title')
	{{trans('Dashboard/main-sidebar_trans.clubs')}}
@stop

<style>
    .position-bg
    {
        /*background-color: #778498;*/
        color: #0162e8;
        padding: 10px;
        border-radius: 5px;
    }
</style>
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">{{trans('Dashboard/main-sidebar_trans.clubs')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{trans('clubs.veiw_all_clubs')}}</span>
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
                                            <img  alt="image" src="{{ asset('uploads/club_logo/' . $club->image) }}"/><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>

										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{$club->name_ar}}</h5>
												<p class="main-profile-name-text">{{$club->date}}</p>
											</div>
										</div>

									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="row row-sm">
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-primary-transparent">
												<i class="icon-calculator text-primary"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">عدد اللاعبين</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">{{$count_players}}</h2>
 											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-danger-transparent">
												<i class="icon-user text-danger"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">اسم المدرب</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">46,782</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-success-transparent">
												<i class="icon-bubble text-success"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">اسم الملعب</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">1,890</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										<li class="active">
											<a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">Players</span> </a>
										<br>
                                        </li>

{{--										<li class="">--}}
{{--											<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">SETTINGS</span> </a>--}}
{{--										</li>--}}

									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">

                                    <div class="tab-pane active" id="home">
                                        <div class="row">
                                            @php
                                                $sortedPlayers = $players->sortBy('position')->values();
                                            @endphp
                                            @foreach($sortedPlayers as $player)
                                                <div class="col-sm-4">
                                                    <div class="border p-1 card thumb">
                                                        <a href="#" class="image-popup" title="Screenshot-2">
                                                            <img width="100px" height="100px" alt="image" src="{{ asset('uploads/players/'. $player->photo) }}" />
                                                        </a>
                                                        <h4 class="text-center tx-14 mt-3 mb-0">{{$player->name_ar}}</h4>
                                                        <div class="ga-border"></div>
                                                        <p class="text-muted text-center"><small>{{$player->shirt_number}}</small></p>
                                                        @if($player->position == 0)
                                                            <h4 class="text-center tx-14 mt-3 mb-0 position-bg ">Goalkeeper</h4>
                                                        @elseif($player->position == 1)
                                                            <h4 class="text-center tx-14 mt-3 mb-0 position-bg">Defender</h4>
                                                        @elseif($player->position == 2)
                                                            <h4 class="text-center tx-14 mt-3 mb-0 position-bg ">Midfielder</h4>
                                                        @elseif($player->position == 3)
                                                            <h4 class="text-center tx-14 mt-3 mb-0 position-bg ">Forward</h4>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>

{{--                                    <div class="tab-pane" id="settings">--}}
{{--										<form role="form">--}}
{{--											<div class="form-group">--}}
{{--												<label for="FullName">Full Name</label>--}}
{{--												<input type="text" value="John Doe" id="FullName" class="form-control">--}}
{{--											</div>--}}
{{--											<div class="form-group">--}}
{{--												<label for="Email">Email</label>--}}
{{--												<input type="email" value="first.last@example.com" id="Email" class="form-control">--}}
{{--											</div>--}}
{{--											<div class="form-group">--}}
{{--												<label for="Username">Username</label>--}}
{{--												<input type="text" value="john" id="Username" class="form-control">--}}
{{--											</div>--}}
{{--											<div class="form-group">--}}
{{--												<label for="Password">Password</label>--}}
{{--												<input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">--}}
{{--											</div>--}}
{{--											<div class="form-group">--}}
{{--												<label for="RePassword">Re-Password</label>--}}
{{--												<input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">--}}
{{--											</div>--}}
{{--											<div class="form-group">--}}
{{--												<label for="AboutMe">About Me</label>--}}
{{--												<textarea id="AboutMe" class="form-control">Loren gypsum dolor sit mate, consecrate disciplining lit, tied diam nonunion nib modernism tincidunt it Loretta dolor manga Amalia erst volute. Ur wise denim ad minim venial, quid nostrum exercise ration perambulator suspicious cortisol nil it applique ex ea commodore consequent.</textarea>--}}
{{--											</div>--}}
{{--											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>--}}
{{--										</form>--}}
{{--									</div>--}}
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
