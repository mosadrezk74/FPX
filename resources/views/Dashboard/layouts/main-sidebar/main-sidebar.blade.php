<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{url('dashboard/admin')}}">
            <h1 class="text-light">
                FPX
            </h1>
        </a>




    </div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('Dashboard/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
                            @auth
                                @if(App::getlocale() == 'ar')
                                    <h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name_ar}}</h4>
                                @else
                                    <h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name_en}}</h4>

                                @endif

                                <span class="mb-0 text-muted">{{Auth::user()->email}}</span>
                            @endauth
                        </div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">{{trans('Dashboard/main-header_trans.main')}}</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('dashboard/admin') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">{{trans('Dashboard/main-header_trans.Dashboard')}}</span>
					</li>
					<li class="side-item side-item-category">{{trans('Dashboard/main-header_trans.General')}}</li>

					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclude" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm12 2H5a1 1 0 0 0-1 1v7h7a1 1 0 0 0 1-1V4z"/>
                                </svg>

								<span class="side-menu__label">
                                    {{trans('Dashboard/main-sidebar_trans.clubs')}}
                                </span><i class="angle fe fe-chevron-down"></i>
                            </svg>
                        </a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('club.index') }}">{{trans('Dashboard/main-sidebar_trans.veiw_all_clubs')}}</a></li>

						</ul>
					</li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                </svg>

                                <span class="side-menu__label">
                                    {{trans('Dashboard/main-sidebar_trans.players')}}
                                </span><i class="angle fe fe-chevron-down"></i>

                            </svg>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('player.index') }}">{{trans('Dashboard/main-sidebar_trans.veiw_all_players')}}</a></li>
                            <li><a class="slide-item" href="{{ route('player_stats.index') }}">{{trans('Dashboard/main-sidebar_trans.veiw_stats')}}</a></li>

                        </ul>
                    </li>




                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                </svg>

                                <span class="side-menu__label">
                                    {{trans('Dashboard/main-sidebar_trans.coach')}}
                                </span><i class="angle fe fe-chevron-down"></i>

                            </svg>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('coach.index') }}">{{trans('Dashboard/main-sidebar_trans.veiw_all_coach')}}</a></li>

                        </ul>
                    </li>


                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                </svg>

                                <span class="side-menu__label">
                                    {{trans('Dashboard/main-sidebar_trans.pages')}}
                                </span><i class="angle fe fe-chevron-down"></i>

                            </svg>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('front.join') }}">{{trans('site/index.join')}}</a></li>

                        </ul>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('front.contact') }}">{{trans('site/index.contact')}}</a></li>

                        </ul>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('front.send') }}">{{trans('site/index.send')}}</a></li>

                        </ul>
                    </li>


				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
