@extends('Dashboard.layouts.master')
@section('title')
    Create Analysis
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
			<div class="card"><div class="card-body">
                    <form action="{{ route('analysis.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name_ar" class="control-label mb-1">{{ trans('index.player_name_ar') }}</label>
                                <input id="name_ar" name="name_ar" type="text" class="form-control" aria-required="true" required>
                                @error('name_ar')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="name_en" class="control-label mb-1">{{ trans('index.player_name_en') }}</label>
                                <input id="name_en" name="name_en" type="text" class="form-control" aria-required="true" required>
                                @error('name_en')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="photo" class="control-label mb-1">{{ trans('index.player_image') }}</label>
                                <input class="form-control" type="file" name="photo" required>
                                @error('photo')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="control-label mb-1">{{ trans('index.email') }}</label>
                                <input class="form-control" type="email" name="email" required>
                                @error('email')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="password" class="control-label mb-1">{{ trans('index.password') }}</label>
                                <input class="form-control" type="password" name="password" required>
                                @error('password')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <button id="payment-button" type="submit" class="btn btn-lg btn-primary">{{ trans('index.submit') }}</button>
                        </div>
                    </form>
                </div>

            </div>
			</div>
		</div>
	</div>
	</div>



@endsection


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#age", {
                maxDate: "2006-01-01",
                dateFormat: "Y-m-d",
            });
        });
    </script>










