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
                                    <label for="player_id">اسم اللاعب</label>
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
                                    <label for="priority">أولوية تحقيق</label>
                                    <select class="custom-select" name="priority" id="priority">
                                        <option selected>Choose...</option>
                                        <option value="1">منخفضة</option>
                                        <option value="2">متوسط</option>
                                        <option value="3">عاليه</option>
                                    </select>
                                </div>
                            </div>
                        {{--####################################################################################################################--}}
                        <div class="form-group">
                        <div class="form-row align-items-center">


                            <div class="col-7">
                                <label for="category">القسم</label>
                                <select class="custom-select" id="category" name="category">
                                    <option selected>Choose...</option>
                                    <option value="1">تسجيل الاهداف</option>
                                    <option value="2">الصناعة</option>
                                    <option value="3">الدفاع</option>
                                    <option value="4">التكتيك</option>
                                </select>
                            </div>


                            <div class="col">
                                <label for="num">العدد</label>
                                <input type="number" id="num" name="num" class="form-control">
                            </div>



                            {{--####################################################################################################################--}}
                        </div>

                        </div>

                        <div class="form-group">
                            <label for="descr">وصف التاسك</label>
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








