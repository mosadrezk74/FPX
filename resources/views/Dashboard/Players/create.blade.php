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
                                                           class="form-control" aria-required="true" required  >
                                                    @error('name_ar')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="name_en" class="control-label mb-1">{{trans('index.player_name_en')}}</label>
                                                    <input id="name_en"  name="name_en" type="text"
                                                           class="form-control" aria-required="true"  required >
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
                                                    @error('club_id')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="shirt" class="control-label mb-1">{{trans('index.player_shirt')}}</label>
                                                    <select id="shirt" name="shirt_number" class="form-control" aria-required="true" required>
                                                     </select>
                                                    @error('shirt_number')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="photo" class="control-label mb-1">{{trans('index.player_image')}}</label>
                                                    <input class="form-control" type="file" name="photo" required>
                                                    @error('photo')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="email" class="control-label mb-1">{{trans('index.email')}}</label>
                                                    <input class="form-control" type="email" name="email" required>
                                                    @error('email')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="password" class="control-label mb-1">{{trans('index.password')}}</label>
                                                    <input class="form-control" type="password" name="password" required>
                                                    @error('password')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="nationality" class="control-label mb-1">{{trans('index.player_nation')}}</label>
                                                    <input id="nationality" name="nationality" list="nationalitiesList" class="form-control" required>
                                                    <datalist id="nationalitiesList">
                                                        <option value="" label="{{trans('nation.player_nation')}}"></option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country['name']['common'] }}">
                                                                {{ trans('nation.country_name.' . strtolower($country['cca2'])) }}
                                                                <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} Flag">
                                                            </option>
                                                        @endforeach
                                                    </datalist>
                                                    @error('nationality')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="age" class="control-label mb-1">{{trans('index.player_age')}}</label>
                                                    <input id="age" name="age" type="text" class="form-control" required data-input aria-required="true">
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
                                                           class="form-control" aria-required="true"  required >
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
                                                    @error('position')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>




                                            </div>
                                        </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        <center>

                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-primary">
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



@endsection

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#age", {
                maxDate: "2006-01-01",
                dateFormat: "Y-m-d",
            });
        });
    </script>










