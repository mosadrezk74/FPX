@extends('Dashboard.layouts.master')

@section('title')
	{{trans('index.statistics')}}
@stop
@section('css')
     <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection


@section('page-header')
 	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">{{trans('index.statistics')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{trans('index.veiw_all')}}</span>
			</div>
		</div>
	</div>
@endsection

	@section('content')
		@include('Dashboard.Clubs.messages_alert')
        <livewire:Chat.createchat />
        <!-- row -->
		<div class="row row-sm">

			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="tab-content border-left border-bottom border-right border-top p-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @php
                                        $sortedPlayers = $players->sortBy('position')->values();
                                    @endphp
                                         <table class="table text-md-nowrap text-center" >
                                             <thead>
                                        <tr>
                                             <th>#</th>
                                            <th class="text-center" >{{trans('player.photo_player')}}</th>
                                            <th  class="text-center">{{trans('player.name')}}</th>
                                            <th class="text-center" >{{trans('player.appearances')}}</th>
                                            <th class="text-center" >{{trans('index.totalgoals')}}</th>
                                            <th class="text-center" >{{trans('index.totalassists')}}</th>
                                            <th class="text-center" >{{trans('index.xg')}}</th>
                                            <th class="text-center" >{{trans('index.xa')}}</th>
                                            <th class="text-center" >{{trans('index.process')}}</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sortedPlayers as $player)
                                        <tr>
                                            <th >{{$loop->iteration}}</th>
                                            <td style="width:50px" >
                                                <img  alt="image" src="{{ asset('uploads/players/'. $player->photo) }}" />
                                            </td>
                                            <td>
                                                <a   style="font-size: 15px ;" href="{{route('stats.show',$player->id)}}">
                                                    @if(App::getLocale() == 'ar')
                                                        {{$player->name_ar}}
                                                    @else
                                                        {{$player->name_en}}
                                                    @endif
                                                </a>
                                            </td>
                                            <td>{{$player->stat->Appearances}}</td>
                                            <td>{{$player->stat->totalGoals}}</td>
                                            <td>{{$player->stat->goalAssists}}</td>
                                            <td>{{rand(100,50)/100 }}</td>
                                            <td>{{rand(100,50)/100 }}</td>

                                            <td>
                                                <div class="NNN">
                                                    <a href="{{route('stats.show',$player->id)}}"  class="btn btn-sm btn-success">{{trans('index.view')}}</a>
                                                     <a href="{{route('stats.print',$player->id)}}" class="btn btn-primary btn-sm" target="_blank" title="طباعه احصائيات لاعب">{{trans('index.print')}}</a>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>



		</div>
		</div>
@endsection
@section('js')
@endsection
