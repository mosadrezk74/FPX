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
@endsection

	@section('content')
		@include('Dashboard.Clubs.messages_alert')

		<!-- row -->
		<div class="row row-sm">

			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @php
                                        $sortedPlayers = $players->sortBy('position')->values();
                                    @endphp
                                         <table id="example-delete" class="table text-md-nowrap">
                                            <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم اللاعب</th>
                                             <th>صورة اللاعب</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sortedPlayers as $player)
                                        <tr>
                                            <th >{{$loop->iteration}}</th>

                                            <td>
                                                <a   style="color:#0040ce;" href="{{route('stats.show',$player->id)}}">
                                                    @if(App::getLocale() == 'ar')
                                                        {{$player->name_ar}}
                                                    @else
                                                        {{$player->name_en}}
                                                    @endif
                                                </a>
                                            </td>
                                            <td  style="width:80px" >
                                                <img  alt="image" src="{{ asset('uploads/players/'. $player->photo) }}" />
                                            </td>
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
