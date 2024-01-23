@extends('Dashboard.layouts.master')

@section('title')
	{{trans('index.statistics')}}
@stop

<style>
    .position-bg
    {

        color: #0162e8;
        padding: 10px;
        border-radius: 5px;
    }
	.NNN{
		display: flex;
		justify-content: center;
		align-items: center;

	}

	.NNN form input{
		margin: 10px;
	}
</style>
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

			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="tab-content border-left border-bottom border-right border-top-0 p-4">

							<div class="tab-pane active" id="home">
								<div class="row">
									@php
										$sortedPlayers = $players->sortBy('position')->values();
									@endphp
									@foreach($sortedPlayers as $player)
										<div class="col-md-3"> <!-- Adjust the column size based on your design -->
											<div class="border p-1 card thumb">
												<a href="#" class="image-popup" title="Screenshot-2">
													<img width="40px" height="100px" alt="image" src="{{ asset('uploads/players/'. $player->photo) }}" />
												</a>
												<h4 class="text-center tx-14 mt-3 mb-0">
													<a   style="color:#0040ce;" >
														@if(App::getLocale() == 'ar')
															{{$player->name_ar}}
														@else
															{{$player->name_en}}
														@endif
													</a>
												</h4>
												<div class="ga-border text-center">
													<div class="NNN">
														<a href="{{route('stats.show',$player->id)}}"  class="btn btn-sm btn-success">{{trans('index.view')}}</a>
														<a href="{{route('stats.print',$player->id)}}" class="btn btn-primary btn-sm" target="_blank" title="طباعه احصائيات لاعب">{{trans('index.print')}}</a>
													</div>
												</div>
												<p class="text-muted text-center"><small>{{$player->shirt_number}}</small></p>
												@if($player->position == 0)
													<h4 class="text-center tx-14 mt-3 mb-0 position-bg ">{{trans('index.Goalkeeper')}}</h4>
												@elseif($player->position == 1)
													<h4 class="text-center tx-14 mt-3 mb-0 position-bg">{{trans('index.Defender')}}</h4>
												@elseif($player->position == 2)
													<h4 class="text-center tx-14 mt-3 mb-0 position-bg ">{{trans('index.Midfielder')}}</h4>
												@elseif($player->position == 3)
													<h4 class="text-center tx-14 mt-3 mb-0 position-bg ">{{trans('index.Forward')}}</h4>
												@endif
											</div>
										</div>
									@endforeach
								</div>
							</div>
                            {{$players->links()}}

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
