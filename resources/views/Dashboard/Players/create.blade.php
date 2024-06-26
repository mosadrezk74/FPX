@extends('Dashboard.layouts.master')
@section('title')
    Create Players
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ trans('Dashboard/main-sidebar_trans.players') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Dashboard/main-sidebar_trans.add_players') }}</span>
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
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('player.store') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="name_ar"
                                                        class="control-label mb-1">{{ trans('index.player_name_ar') }}</label>
                                                    <input id="name_ar" name="name_ar" type="text" class="form-control"
                                                        aria-required="true" required>
                                                    @error('name_ar')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="name_en"
                                                        class="control-label mb-1">{{ trans('index.player_name_en') }}</label>
                                                    <input id="name_en" name="name_en" type="text" class="form-control"
                                                        aria-required="true" required>
                                                    @error('name_en')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="club"
                                                        class="control-label mb-1">{{ trans('index.club') }}</label>
                                                    <select id="club" name="club_id" class="form-control" required>
                                                        <option value="">{{ trans('index.clubs') }}</option>
                                                        @foreach ($clubs as $club)
                                                            @if ($club->status == 1)
                                                                @if (App::getLocale() == 'ar')
                                                                    <option value="{{ $club->id }}">
                                                                        {{ $club->name_ar }}</option>
                                                                @else
                                                                    <option value="{{ $club->id }}">
                                                                        {{ $club->name_en }}</option>
                                                                @endif
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
                                                    <label for="photo"
                                                        class="control-label mb-1">{{ trans('index.player_image') }}</label>
                                                    <input class="form-control" type="text" name="photo" required
                                                        autocomplete="disabled">
                                                    @error('photo')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="email"
                                                        class="control-label mb-1">{{ trans('index.email') }}</label>
                                                    <input class="form-control" type="email" name="email" required>
                                                    @error('email')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="password"
                                                        class="control-label mb-1">{{ trans('index.password') }}</label>
                                                    <input class="form-control" type="password" name="password" required>
                                                    @error('password')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="position"
                                                        class="control-label mb-1">{{ trans('index.player_position') }}</label>
                                                    <select id="position" name="position" class="form-control" required>
                                                        <option value="" disabled selected>
                                                            {{ trans('index.player_position_SS') }}</option>
                                                        <option value="0">{{ trans('index.player_position_GK') }}
                                                        </option>
                                                        <option value="1">{{ trans('index.player_position_DF') }}
                                                        </option>
                                                        <option value="2">{{ trans('index.player_position_MF') }}
                                                        </option>
                                                        <option value="3">{{ trans('index.player_position_FW') }}
                                                        </option>
                                                    </select>
                                                    @error('position')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                {{-- ################################################################################################################# --}}
                                                <div class="col-12">
                                                    <label for="rate"
                                                        class="control-label mb-1">{{ trans('index.rate') }}</label>
                                                    <select id="rate" name="rate" class="form-control" required>
                                                        <option value="" disabled selected>--</option>
                                                        <option value="1">World Class</option>
                                                        <option value="2">Class A</option>
                                                        <option value="3">Class B</option>
                                                        <option value="4">Class C</option>
                                                        <option value="5">Class D</option>
                                                    </select>
                                                    @error('position')
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
                                                    <label for="age"
                                                        class="control-label mb-1">{{ trans('index.player_age') }}</label>
                                                    <input id="age" name="age" type="text"
                                                        class="form-control" required data-input aria-required="true">
                                                    @error('age')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="height"
                                                        class="control-label mb-1">{{ trans('index.player_height') }}</label>
                                                    <input id="height" name="height" type="text"
                                                        class="form-control" aria-required="true" required>
                                                    @error('height')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="weight"
                                                        class="control-label mb-1">{{ trans('index.player_weight') }}</label>
                                                    <input id="weight" name="weight" type="text"
                                                        class="form-control" aria-required="true" required>
                                                    @error('weight')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="shirt"
                                                        class="control-label mb-1">{{ trans('index.player_shirt') }}</label>
                                                    <select id="shirt" name="shirt_number" class="form-control"
                                                        required>
                                                        <option value="" disabled selected>Choose a number</option>
                                                    </select>
                                                    @error('shirt_number')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="nationality">{{ trans('coach.nationality') }}</label>
                                                    <input id="nationality" name="nationality" list="nationalitiesList"
                                                        class="form-control" required>
                                                    <datalist id="nationalitiesList">
                                                        <option value=""
                                                            label="{{ trans('nation.player_nation') }}"></option>
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
                                                    <input type="text" list="player_stats_list" id="stat_id"
                                                        name="stat_id" class="form-control"
                                                        placeholder="اختر اسم اللاعب-" required>
                                                    <datalist id="player_stats_list">
                                                        <option value="{{ trans('index.clubs') }}" disabled></option>
                                                        @foreach ($player_stats as $st)
                                                            <option value="{{ $st->id }}">{{ $st->Name }}
                                                            </option>
                                                        @endforeach
                                                    </datalist>
                                                    @error('stat_id')
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
                            <div class="col-12 text-center mt-3">
                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary">
                                    {{ trans('index.submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#age", {
            maxDate: "2006-01-01",
            dateFormat: "Y-m-d",
        });
    });
</script>

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('09e3705206806b30572a', {
        cluster: 'mt1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('App\\Events\\MyEvent', function(data) {
        alert(JSON.stringify(data.name_ar));
    });
</script>
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
