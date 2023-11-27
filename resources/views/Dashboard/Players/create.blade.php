@extends('Dashboard.layouts.master')
@section('css')
	<!--Internal Sumoselect css-->
	<link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
	<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

	<!-- Internal Select2 css -->
	<link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
	<!--Internal  Datetimepicker-slider css -->
	<link href="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
	<link href="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
	<link href="{{URL::asset('Dashboard/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
	<!-- Internal Spectrum-colorpicker css -->
	<link href="{{URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">

	@section('title')
        {{trans('Dashboard/main-sidebar_trans.players')}}
	@stop
@endsection
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
	<div style="background-color: white">
	<!-- row -->
	<div class="row" >
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-body" >
                    <form action="{{ route('player.store') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="name_ar" class="control-label mb-1">{{trans('index.player_name_ar')}}</label>
                                                    <input id="name_ar"  name="name_ar" type="text"
                                                           class="form-control" aria-required="true"   >
                                                    @error('name_ar')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="name_en" class="control-label mb-1">{{trans('index.player_name_en')}}</label>
                                                    <input id="name_en"  name="name_en" type="text"
                                                           class="form-control" aria-required="true"   >
                                                    @error('name_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="club" class="control-label mb-1">{{trans('index.club')}}</label>

                                                    <select id="club" name="club_id" class="form-control" required>
                                                        <option value="">{{trans('index.clubs')}}</option>
                                                        @foreach($clubs as $club)
                                                            @if (App::getLocale() == 'ar')
                                                            <option value="{{$club->id}}">{{$club->name_ar}}</option>
                                                            @else
                                                                <option value="{{$club->id}}">{{$club->name_en}}</option>
                                                            @endif
                                                        @endforeach

                                                    </select>
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="image" class="control-label mb-1">{{trans('index.player_image')}}</label>
                                                    <input class="form-control" type="file" name="photo">
                                                    @error('photo')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="password" class="control-label mb-1">{{trans('index.email')}}</label>
                                                    <input class="form-control" type="email" name="email">
                                                    @error('email')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="password" class="control-label mb-1">{{trans('index.password')}}</label>
                                                    <input class="form-control" type="password" name="password">
                                                    @error('photo')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="nationality" class="control-label mb-1">{{trans('index.player_nation')}}</label>

                                                    <select id="nationality" name="nationality" class="form-control" required>
                                                             <option selected disabled>{{trans('nation.player_nation')}}</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country['name']['common'] }}">
                                                                    {{ trans('nation.country_name.' . strtolower($country['cca2'])) }}
                                                                    <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} Flag">
                                                                </option>
                                                            @endforeach

                                                    </select>

                                                    @error('nationality')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="age" class="control-label mb-1">{{trans('index.player_age')}}</label>
                                                    <input id="age"  name="age" type="date"
                                                           class="form-control" aria-required="true"   >
                                                    @error('age')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>



                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="height" class="control-label mb-1">{{trans('index.player_height')}}</label>
                                                    <input id="height"  name="height" type="text"
                                                           class="form-control" aria-required="true"   >
                                                    @error('height')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="position" class="control-label mb-1">{{trans('index.player_position')}}</label>
                                                    <select id="position" name="position" class="form-control" required>
                                                        <option value="" disabled selected>{{trans('index.player_position_SS')}}</option>
                                                        <option value="0">{{trans('index.player_position_GK')}}</option>
                                                        <option value="1">{{trans('index.player_position_DF')}}</option>
                                                        <option value="2">{{trans('index.player_position_MF')}}</option>
                                                        <option value="3">{{trans('index.player_position_FW')}}</option>
                                                     </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="shirt" class="control-label mb-1">{{trans('index.player_shirt')}}</label>
                                                    <input id="shirt" name="shirt_number" class="form-control" type="text" aria-required="true"
                                                    placeholder="Enter Number between 1-99">

                                                </div>
                                            </div>
                                        </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        <center>

                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info">
                                Submit
                            </button>
                        </div>
                        </center>

                    </form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- /row -->
	</div>
	<!-- Container closed -->
	</div>
	<!-- main-content closed -->
@endsection
@section('js')



	<!--Internal  Form-elements js-->
	<script src="{{ URL::asset('Dashboard/js/select2.js') }}"></script>
	<script src="{{ URL::asset('Dashboard/js/advanced-form-elements.js') }}"></script>

	<!--Internal Sumoselect js-->
	<script src="{{ URL::asset('Dashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
	<!--Internal  Notify js -->
	<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
	<script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>


	<!--Internal  Datepicker js -->
	<script src="{{URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
	<!--Internal  jquery.maskedinput js -->
	<script src="{{URL::asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
	<!--Internal  spectrum-colorpicker js -->
	<script src="{{URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
	<!-- Internal Select2.min js -->
	<script src="{{URL::asset('dashboard/plugins/select2/js/select2.min.js')}}"></script>
	<!--Internal Ion.rangeSlider.min js -->
	<script src="{{URL::asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
	<!--Internal  jquery-simple-datetimepicker js -->
	<script src="{{URL::asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
	<!-- Ionicons js -->
	<script src="{{URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
	<!--Internal  pickerjs js -->
	<script src="{{URL::asset('dashboard/plugins/pickerjs/picker.min.js')}}"></script>
	<!-- Internal form-elements js -->
	<script src="{{URL::asset('dashboard/js/form-elements.js')}}"></script>



@endsection

