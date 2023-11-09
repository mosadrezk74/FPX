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
		{{trans('doctors.add_doctor')}}
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
                                                    <label for="nationality" class="control-label mb-1">{{trans('index.player_nation')}}</label>

                                                    <select id="nationality" name="nationality" class="form-control" required>
                                                        <option value="" >{{trans('index.player_nation')}}</option>
                                                         <option value="EG">{{ trans('nation.egypt') }}</option>
                                                        <option value="PL">{{ trans('nation.palestine') }}</option>
                                                        <option value="DZ">{{ trans('nation.algeria') }}</option>
                                                        <option value="AO">{{ trans('nation.angola') }}</option>
                                                        <option value="AR">{{ trans('nation.argentina') }}</option>
                                                        <option value="BH">{{ trans('nation.bahrain') }}</option>
                                                        <option value="BJ">{{ trans('nation.benin') }}</option>
                                                        <option value="BO">{{ trans('nation.bolivia') }}</option>
                                                        <option value="BW">{{ trans('nation.botswana') }}</option>
                                                        <option value="BR">{{ trans('nation.brazil') }}</option>
                                                        <option value="BF">{{ trans('nation.burkina-faso') }}</option>
                                                        <option value="BI">{{ trans('nation.burundi') }}</option>
                                                        <option value="CM">{{ trans('nation.cameroon') }}</option>
                                                        <option value="CV">{{ trans('nation.cape-verde') }}</option>
                                                        <option value="CF">{{ trans('nation.central-african-republic') }}</option>
                                                        <option value="TD">{{ trans('nation.chad') }}</option>
                                                        <option value="KM">{{ trans('nation.comoros') }}</option>
                                                        <option value="CG">{{ trans('nation.congo') }}</option>
                                                        <option value="CD">{{ trans('nation.democratic-republic-of-the-congo') }}</option>
                                                        <option value="CK">{{ trans('nation.cook-islands') }}</option>
                                                        <option value="CI">{{ trans('nation.cote-divoire') }}</option>
                                                        <option value="GQ">{{ trans('nation.equatorial-guinea') }}</option>
                                                        <option value="ET">{{ trans('nation.ethiopia') }}</option>
                                                        <option value="FR">{{ trans('nation.france') }}</option>
                                                        <option value="GA">{{ trans('nation.gabon') }}</option>
                                                        <option value="GM">{{ trans('nation.gambia') }}</option>
                                                        <option value="DE">{{ trans('nation.germany') }}</option>
                                                        <option value="GH">{{ trans('nation.ghana') }}</option>
                                                        <option value="GR">{{ trans('nation.greece') }}</option>
                                                        <option value="GN">{{ trans('nation.guinea') }}</option>
                                                        <option value="GW">{{ trans('nation.guinea-bissau') }}</option>
                                                        <option value="IQ">{{ trans('nation.iraq') }}</option>
                                                        <option value="IT">{{ trans('nation.italy') }}</option>
                                                        <option value="JO">{{ trans('nation.jordan') }}</option>
                                                        <option value="KE">{{ trans('nation.kenya') }}</option>
                                                        <option value="KW">{{ trans('nation.kuwait') }}</option>
                                                        <option value="LB">{{ trans('nation.lebanon') }}</option>
                                                        <option value="LR">{{ trans('nation.liberia') }}</option>
                                                        <option value="LY">{{ trans('nation.libya') }}</option>
                                                        <option value="MG">{{ trans('nation.madagascar') }}</option>
                                                        <option value="MW">{{ trans('nation.malawi') }}</option>
                                                        <option value="ML">{{ trans('nation.mali') }}</option>
                                                        <option value="MA">{{ trans('nation.morocco') }}</option>
                                                        <option value="MZ">{{ trans('nation.mozambique') }}</option>
                                                        <option value="NA">{{ trans('nation.namibia') }}</option>
                                                        <option value="NL">{{ trans('nation.netherlands') }}</option>
                                                        <option value="NE">{{ trans('nation.niger') }}</option>
                                                        <option value="NG">{{ trans('nation.nigeria') }}</option>
                                                        <option value="OM">{{ trans('nation.oman') }}</option>
                                                        <option value="PT">{{ trans('nation.portugal') }}</option>
                                                        <option value="QA">{{ trans('nation.qatar') }}</option>
                                                        <option value="RW">{{ trans('nation.rwanda') }}</option>
                                                        <option value="SA">{{ trans('nation.saudi-arabia') }}</option>
                                                        <option value="SN">{{ trans('nation.senegal') }}</option>
                                                        <option value="SO">{{ trans('nation.somalia') }}</option>
                                                        <option value="ZA">{{ trans('nation.south-africa') }}</option>
                                                        <option value="ES">{{ trans('nation.spain') }}</option>
                                                        <option value="SD">{{ trans('nation.sudan') }}</option>
                                                         <option value="TN">{{ trans('nation.tunisia') }}</option>
                                                        <option value="UG">{{ trans('nation.uganda') }}</option>
                                                        <option value="ZM">{{ trans('nation.zambia') }}</option>
                                                        <option value="ZW">{{ trans('nation.zimbabwe') }}</option>
                                                    </select>

                                                    @error('nationality')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="age" class="control-label mb-1">{{trans('index.player_age')}}</label>
                                                    <input id="age"  name="age" type="text"
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
                                                        <option value="">{{trans('index.player_position_SS')}}</option>

                                                     </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="shirt" class="control-label mb-1">{{trans('index.player_shirt')}}</label>
                                                    <select id="shirt" name="shirt_number" class="form-control" required>
                                                        <option value="">{{trans('index.player_shirt_number')}}</option>

                                                    </select>
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

