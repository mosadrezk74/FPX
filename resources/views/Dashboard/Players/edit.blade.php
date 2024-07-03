@extends('Dashboard.layouts.master')
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                @if (App::getlocale() == 'ar')
                    <h4 class="content-title mb-0 my-auto">تحديث البيانات</h4>
                    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $player->name_ar }} -
                        {{ $player->club->name_ar }}</span>
                @else
                    <h4 class="content-title mb-0 my-auto">Update Profile</h4>
                    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ $player->name_en }} -
                        {{ $player->club->name_en }}</span>
                @endif
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- row -->
    <div class="row row-sm">
        <div class="container">
            <div class="row flex-lg-nowrap">
                <div class="col">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="e-profile">
                                        <div class="row">
                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded">
                                                        @if ($player && $player->photo)
                                                            <img alt="user-img"
                                                                class="d-flex justify-content-center align-items-center rounded"
                                                                src="{{ $player->photo }}">
                                                        @else
                                                            <img alt="user-img" class="avatar avatar-xl brround"
                                                                src="{{ asset('Dashboard/img/faces/6.jpg') }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                    @if (App::getlocale() == 'ar')
                                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap text-center">
                                                            {{ $player->name_ar }}</h4>
                                                    @else
                                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap text-center">
                                                            {{ $player->name_en }}</h4>
                                                    @endif
                                                    <div class="text-muted text-center"><small>{{ $player->email }}</small>
                                                    </div>
                                                </div>
                                                <div class="text-center text-sm-right">
                                                    <span class="badge badge-secondary">
                                                        @if (Auth::guard('coach')->check())
                                                            @if (App::getlocale() == 'ar')
                                                                مــدرب {{ $player->club->name_ar }}
                                                            @else
                                                                {{ $player->club->name_en }}'s Coach
                                                            @endif
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active">
                                                <form action="{{ route('player.update', $player->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>{{ trans('coach.name_ar') }}</label>
                                                                        <input class="form-control" type="text"
                                                                            name="name_ar" value="{{ $player->name_ar }}">
                                                                    </div>
                                                                    @error('name_ar')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>{{ trans('coach.name_en') }}</label>
                                                                        <input class="form-control" type="text"
                                                                            name="name_en" value="{{ $player->name_en }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>{{ trans('index.club') }}</label>
                                                                        @if (App::Getlocale() == 'ar')
                                                                            <input class="form-control" type="text"
                                                                                disabled
                                                                                value="{{ $player->club->name_ar }}">
                                                                        @else
                                                                            <input class="form-control" type="text"
                                                                                disabled
                                                                                value="{{ $player->club->name_en }}">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>{{ trans('index.email') }}</label>
                                                                        <input class="form-control" type="text"
                                                                            name="email" value="{{ $player->email }}">
                                                                        @error('email')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label
                                                                            title="ارفع الصورة بك علي موقع imgbb و انسخ رابط الصورة هنا">{{ trans('index.Change_Photo') }}
                                                                            <a href="https://imgbb.com/" target="_blank"><i
                                                                                    class="fa fa-question-circle"
                                                                                    aria-hidden="true"></i></a>
                                                                        </label>
                                                                        <input type="text" name="photo"
                                                                            class="form-control"
                                                                            value="{{ $player->photo }}">
                                                                        @error('photo')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6 mb-3">
                                                            <div class="mb-2"><b>{{ trans('index.Change_Password') }}</b>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>{{ trans('index.password') }}</label>
                                                                        <input class="form-control" type="password"
                                                                            name="password"
                                                                            placeholder="***********************">
                                                                        @error('password')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @if (Auth()->guard('admin')->check())
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label
                                                                        for="nationality">{{ trans('coach.nationality') }}</label>
                                                                    <input id="nationality" name="nationality"
                                                                        list="nationalitiesList"
                                                                        value="{{ $player->country->id }}"
                                                                        class="form-control" required>
                                                                    <datalist id="nationalitiesList">
                                                                        <option value=""
                                                                            label="{{ trans('nation.player_nation') }}">
                                                                        </option>
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->id }}">
                                                                                @if (App::getLocale() == 'ar')
                                                                                    {{ $country->name_ar }}
                                                                                @else
                                                                                    {{ $country->name_en }}
                                                                                @endif
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
                                                                    <label for="stat_id"
                                                                        class="control-label mb-1">{{ trans('stat.stat') }}</label>
                                                                    <input type="text" list="player_stats_list"
                                                                        id="stat_id" value="{{ $player->stat->id }}"
                                                                        name="stat_id" class="form-control"
                                                                        placeholder="اختر اسم اللاعب-" required>
                                                                    <datalist id="player_stats_list">
                                                                        <option value="{{ trans('index.clubs') }}"
                                                                            disabled></option>
                                                                        @foreach ($player_stats as $st)
                                                                            <option value="{{ $st->id }}">
                                                                                {{ $st->Name }}</option>
                                                                        @endforeach
                                                                    </datalist>
                                                                    @error('stat_id')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label for="age"
                                                                        class="control-label mb-1">{{ trans('index.player_age') }}</label>
                                                                    <input id="age" name="age" type="text"
                                                                        value="{{ $player->age }}" class="form-control"
                                                                        required data-input aria-required="true">
                                                                    @error('stat_id')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <hr>
                                                    <div class="text-center">
                                                        <button class="btn btn-primary"
                                                            type="submit">{{ trans('index.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#club').change(function() {
                var clubId = $(this).val();
                if (clubId) {
                    $.ajax({
                        url: '/get-available-shirt-numbers/' + clubId,
                        type: 'GET',
                        success: function(data) {
                            var shirtSelect = $('#shirt');
                            shirtSelect.empty();
                            shirtSelect.append(
                                '<option value="" disabled selected>Choose a number</option>'
                            );
                            $.each(data, function(index, number) {
                                shirtSelect.append('<option value="' + number + '">' +
                                    number + '</option>');
                            });
                        },
                        error: function() {
                            alert('Error fetching shirt numbers');
                        }
                    });
                } else {
                    $('#shirt').empty();
                    $('#shirt').append('<option value="" disabled selected>Choose a number</option>');
                }
            });
        });
    </script>
@endsection
