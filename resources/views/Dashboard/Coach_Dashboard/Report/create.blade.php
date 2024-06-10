@extends('Dashboard.layouts.master')
@section('title')
    Create Players
@stop

@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto"> {{trans('Dashboard/main-sidebar_trans.clubs')}}</h4><span
						class="text-muted mt-1 tx-13 mr-2 mb-0">/
               {{trans('Dashboard/main-sidebar_trans.add_clubs')}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')

	@include('Dashboard.messages_alert')
{{--	<div style="background-color: white">--}}
	<!-- row -->
	<div class="row" >
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-body" >
                    <form action="{{ route('report.store') }}"   method="post" enctype="multipart/form-data">
                        @csrf
                             <div class="form-row align-items-center">
                                <div class="col-7">
                                    <label for="player_id">{{trans('index.Name')}}</label>
                                    <select id="player_id" name="player_id" class="form-control" required>
                                        <option value="">{{trans('index.taskName')}}</option>
                                        @foreach($players as $player)
                                                @if (App::getLocale() == 'ar')
                                                    <option value="{{$player->id}}">{{$player->name_ar}}</option>
                                                @else
                                                    <option value="{{$player->id}}">{{$player->name_en}}</option>
                                                @endif
                                        @endforeach
                                    </select>
                                </div>
                                 {{--####################################################################################################################--}}
                                 <div class="col">
                                    <label for="priority">{{trans('index.Priority')}}</label>
                                    <select class="custom-select" name="priority" id="priority">
                                        <option selected>{{trans('index.choose')}}</option>
                                        <option value="1">{{trans('index.low')}}</option>
                                        <option value="2">{{trans('index.midl')}}</option>
                                        <option value="3">{{trans('index.high')}}</option>
                                    </select>
                                </div>
                            </div>
                        {{--####################################################################################################################--}}
                        <div class="form-group">
                        <div class="form-row align-items-center">


                            <div class="col-7">
                                <label for="category">{{trans('index.category')}}</label>
                                <select class="custom-select" id="category" name="category">
                                    <option selected>{{trans('index.choose')}}...</option>
                                    <option value="1">{{trans('index.goals_scoring')}}</option>
                                    <option value="2">{{trans('index.assist_s')}}</option>
                                    <option value="3">{{trans('index.defense')}}</option>
                                    <option value="4">{{trans('index.dribbling')}}</option>
                                    <option value="5">{{trans('index.passing')}}</option>
                                    <option value="6">{{trans('index.shooting')}}</option>
                                    <option value="7">{{trans('index.task_description')}}</option>
                                </select>
                            </div>


                            <div class="col">
                                <label for="num">{{trans('index.number')}}</label>
                                <input type="number" id="num" name="num" class="form-control">
                            </div>



                            {{--####################################################################################################################--}}
                        </div>

                        </div>

                        <div class="form-group">
                            <label for="descr">{{trans('index.task_description')}}</label>
                            <textarea class="form-control" id="descr" name="descr" rows="3"></textarea>
                        </div>
                        {{--####################################################################################################################--}}



                        <button   type="submit" class="btn btn-lg btn-primary btn-block">
                            Submit
                        </button>
                    </form>
				</div>
			</div>
		</div>
	</div>




@endsection








