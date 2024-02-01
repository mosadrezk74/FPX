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

					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
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
                                                        <h4 class="text-center tx-14 mt-3 mb-0">
														<a href="" style="color:#0040ce;" >
															@if(App::getLocale() == 'ar')
															{{$player->name_ar}}
															@else
															{{$player->name_en}}
															@endif
														</a>
														</h4>
                                                        <div class="ga-border">
															<div class="NNN">

																<a href="{{route('stats.show',$player->id)}}" class="btn btn-sm btn-success">عرض</a>
																<a href="{{route('stats.print',$player->id)}}" class="btn btn-primary btn-sm" target="_blank" title="طباعه احصائيات لاعب">طباعة</a>

															</div>
														</div>
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
