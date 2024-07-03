@extends('Dashboard.layouts.master2')
@section('css')
    <style>
        .panel {
            display: none;
        }
    </style>
    <link href="{{ URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white mt-5">
                <div class="login d-flex align-items-center py-2">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin border rounded p-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">{{ trans('Dashboard/login-page.choose') }}
                                        </label>
                                        <select class="form-control" id="sectionChooser">
                                            <option value="" selected disabled>
                                                {{ trans('Dashboard/login-page.choose2') }}</option>
                                            <option value="admin">{{ trans('Dashboard/login-page.Admin') }}</option>
                                            <option value="player">{{ trans('auth.player') }}</option>
                                            <option value="coach">{{ trans('auth.coach') }}</option>

                                        </select>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            {{--    Admin   --}}
                                            <div class="panel" id="admin">
                                                <h2>{{ trans('Dashboard/login-page.Admins') }}</h2>
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login-page.Email') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/login-page.SS') }}"
                                                            type="email" name="email" :value="old('email')" required
                                                            autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login-page.Password') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/login-page.SS2') }}"
                                                            type="password" name="password" required
                                                            autocomplete="current-password">
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-main-primary btn-block">{{ trans('Dashboard/login-page.Sign') }}</button>
                                                </form>
                                            </div>

                                            {{--    coach   --}}
                                            <div class="panel" id="coach">
                                                <div class="main-signup-header">
                                                    <h2>{{ trans('Dashboard/login-page.coach') }}</h2>
                                                    <form method="POST" action="{{ route('login.coach') }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>{{ trans('Dashboard/login-page.Email') }}</label>
                                                            <input class="form-control"
                                                                placeholder="{{ trans('Dashboard/login-page.SS') }}"
                                                                type="email" name="email" :value="old('email')"
                                                                required autofocus>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>{{ trans('Dashboard/login-page.Password') }}</label>
                                                            <input class="form-control"
                                                                placeholder="{{ trans('Dashboard/login-page.SS2') }}"
                                                                type="password" name="password" required
                                                                autocomplete="current-password">
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-main-primary btn-block">{{ trans('Dashboard/login-page.Sign') }}</button>
                                                    </form>
                                                </div>
                                            </div>

                                            {{--    player   --}}
                                            <div class="panel" id="player">
                                                <h2>{{ trans('Dashboard/login-page.player') }}</h2>
                                                <form method="POST" action="{{ route('login.player') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login-page.Email') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/login-page.SS') }}"
                                                            type="email" name="email" :value="old('email')" required
                                                            autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login-page.Password') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/login-page.SS2') }}"
                                                            type="password" name="password" required
                                                            autocomplete="current-password">
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-main-primary btn-block">{{ trans('Dashboard/login-page.Sign') }}</button>
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
    @endsection
    @section('js')
        <script>
            $('#sectionChooser').change(function() {
                var myID = $(this).val();
                $('.panel').each(function() {
                    myID === $(this).attr('id') ? $(this).show() : $(this).hide();
                });
            });
        </script>
    @endsection
