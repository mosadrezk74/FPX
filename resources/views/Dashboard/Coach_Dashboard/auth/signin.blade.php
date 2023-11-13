@extends('Dashboard.layouts.master2')

@section('css')
    <link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection

@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
{{--							<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">--}}
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28"> </h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>Welcome back again !</h2>
												<h2>Cacoch !</h2>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Coach Dashboard</label>

                                                </div>

                                                <div class="panel" id="admin">
                                                    <h2>{{trans('Dashboard/login-page.Admin2')}}</h2>
                                                    <form method="POST" action="{{ route('login.coach') }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>{{trans('Dashboard/login-page.Email')}}</label>
                                                            <input  class="form-control" placeholder="{{trans('Dashboard/login-page.SS')}}" type="email" name="email" :value="old('email')" required autofocus>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>{{trans('Dashboard/login-page.Password')}}</label>
                                                            <input class="form-control" placeholder="{{trans('Dashboard/login-page.SS2')}}"   type="password"name="password" required autocomplete="current-password" >
                                                        </div>
                                                        <button type="submit" class="btn btn-main-primary btn-block">{{trans('Dashboard/login-page.Sign')}}</button>
                                                        <div class="row row-xs">
                                                            <div class="col-sm-6">
                                                                <button class="btn btn-block"><i class="fab fa-facebook-f"></i> {{trans('Dashboard/login-page.SignFb')}}</button>
                                                            </div>
                                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                                <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{trans('Dashboard/login-page.SignTw')}}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

											</div>

                                        </div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
            </div>
@endsection
@section('js')
    <script>
        $('#sectionChooser').change(function(){
            var myID = $(this).val();
            $('.loginform').each(function(){
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
