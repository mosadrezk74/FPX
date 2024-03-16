@extends('Dashboard.layouts.master2')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white mt-5">
                <div class="login d-flex align-items-center py-2">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin border rounded p-4">
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{trans('Dashboard/login-page.player')}}</h2>
                                            {{--												<h2>{{trans('Dashboard/login-page.Admin2')}}</h2>--}}
                                            <form method="POST" action="{{ route('login.analysis') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{trans('Dashboard/login-page.Email')}}</label>
                                                    <input class="form-control" placeholder="{{trans('Dashboard/login-page.SS')}}" type="email" name="email" :value="old('email')" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{trans('Dashboard/login-page.Password')}}</label>
                                                    <input class="form-control" placeholder="{{trans('Dashboard/login-page.SS2')}}" type="password" name="password" required autocomplete="current-password">
                                                </div>
                                                <button type="submit" class="btn btn-main-primary btn-block">{{trans('Dashboard/login-page.Sign')}}</button>
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
