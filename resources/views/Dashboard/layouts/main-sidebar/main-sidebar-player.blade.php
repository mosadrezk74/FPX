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
                            @if($player)

                                <img alt="user-img" class="avatar avatar-xl brround"
                                     src="{{$player->photo}}" >
                            @else
                                <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('Dashboard/img/faces/6.jpg')}}">
                            @endif
                        </div>
						<div class="user-info">
                            @auth
                                @if(App::getLocale()=='ar')
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
					<li class="side-item side-item-category">Main</li>
					<li class="slide">
                        <a class="side-menu__item" href="{{ url('dashboard/player')  }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" >
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/>
                                <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg>
                            <span class="side-menu__label">{{trans('Dashboard/main-sidebar_trans.player_dash')}}</span>
                        </a>
					</li>
					<li class="side-item side-item-category">General</li>

					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <defs xmlns="http://www.w3.org/2000/svg"><style>.cls-1{fill:none;}</style></defs>
                                <title xmlns="http://www.w3.org/2000/svg">increase-level</title><polygon xmlns="http://www.w3.org/2000/svg" points="23 4 18 7.75 18 14.25 15 12 10 15.75 10 22.25 7 20 2 23.75 2 30 4 30 4 24.75 7 22.5 10 24.75 10 30 12 30 12 16.75 15 14.5 18 16.75 18 30 20 30 20 8.75 23 6.5 26 8.75 26 30 28 30 28 7.75 23 4"/><rect xmlns="http://www.w3.org/2000/svg" id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/>

								<span class="side-menu__label">
                                  {{trans('Dashboard/main-sidebar_trans.performance')}}
                                </span><i class="angle fe fe-chevron-down"></i>
                            </svg>
                        </a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('player.stats') }}">{{trans('Dashboard/main-sidebar_trans.stats')}} </a></li>

						</ul>
                        <ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('player.match_rating') }}">{{trans('Dashboard/main-sidebar_trans.rating')}} </a></li>
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclude" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm12 2H5a1 1 0 0 0-1 1v7h7a1 1 0 0 0 1-1V4z"/>
                                </svg>

								<span class="side-menu__label">
                                    {{trans('Dashboard/main-sidebar_trans.tasks')}}
                                </span><i class="angle fe fe-chevron-down"></i>
                            </svg>
                        </a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('player.report') }}">{{trans('Dashboard/main-sidebar_trans.task_coach')}} </a></li>

						</ul>


					</li>


                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M0 0s1.5 0 1.5 1.5S0 3 0 3s0 1.5 1.5 1.5S3 4.5 3 4.5s0 1.5-1.5 1.5S0 6 0 6s0 1.5 1.5 1.5S3 7.5 3 7.5s0 1.5-1.5 1.5S0 9 0 9s0 1.5 1.5 1.5S3 10.5 3 10.5s0 1.5-1.5 1.5S0 12 0 12s0 1.5 1.5 1.5S3 13.5 3 13.5s0 1.5-1.5 1.5S0 15 0 15s0 1.5 1.5 1.5S3 16.5 3 16.5s0 1.5-1.5 1.5S0 18 0 18s0 1.5 1.5 1.5S3 19.5 3 19.5s0 1.5-1.5 1.5S0 21 0 21s0 1.5 1.5 1.5S3 22.5 3 22.5s0 1.5-1.5 1.5S0 24 0 24h16s-1.5 0-1.5-1.5S16 21 16 21s0-1.5 1.5-1.5S19 19.5 19 19.5s0-1.5-1.5-1.5S16 16.5 16 16.5s0-1.5 1.5-1.5S19 14 19 14s0-1.5-1.5-1.5S16 11.5 16 11.5s0-1.5 1.5-1.5S19 9 19 9s0-1.5-1.5-1.5S16 6 16 6s0-1.5 1.5-1.5S19 3 19 3s0-1.5-1.5-1.5S16 0 16 0H0z"/>
                                </svg>
                            </svg>


                            <span class="side-menu__label">
                            {{trans('index.y_player')}}
                        </span>
                            <i class="angle fe fe-chevron-down"></i>
                            </svg>
                        </a>

                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('player.club_info') }}">{{trans('index.pub_info')}}</a></li>
                        </ul>

                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('player.epl_stats') }}">{{trans('index.y_stats')}}</a></li>
                        </ul>

                    </li>




                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclude" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm12 2H5a1 1 0 0 0-1 1v7h7a1 1 0 0 0 1-1V4z"/>
                                </svg>

								<span class="side-menu__label">
                                   {{trans('Dashboard/main-sidebar_trans.con')}}
                                </span><i class="angle fe fe-chevron-down"></i>
                            </svg>
                        </a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('player.chat') }}">{{trans('Dashboard/main-sidebar_trans.con_chat')}}</a></li>
                        </ul>



					</li>

                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclude" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm12 2H5a1 1 0 0 0-1 1v7h7a1 1 0 0 0 1-1V4z"/>
                                </svg>

								<span class="side-menu__label">
                                   {{trans('Dashboard/main-sidebar_trans.compare')}}
                                </span><i class="angle fe fe-chevron-down"></i>
                            </svg>
                        </a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('player.compare') }}">{{trans('Dashboard/main-sidebar_trans.compare')}}</a></li>
                        </ul>




{{--						</ul><ul class="slide-menu">--}}
{{--							<li><a class="slide-item" href="{{ route('player.chat_player') }}"> زملاء الفريق </a></li>--}}

{{--						</ul>--}}


					</li>


                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" width="1em" height="1em">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-2-11.86V7h4v1.14l-1.45 1.45L13 9.29l3.84 3.85-1.42 1.42L11 11.71l-1.41 1.41L7.86 12l-1.41-1.41 2.86-2.86L11 6.29l1.41 1.41zm2 8.86h-4v-1.14l1.45-1.45L11 14.71l-3.84-3.85 1.42-1.42L13 12.29l1.41-1.41 1.42 1.42 2.86 2.86-1.42 1.42-2.86-2.86z" opacity=".3"/>
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-2-11.86V7h4v1.14l-1.45 1.45L13 9.29l3.84 3.85-1.42 1.42L11 11.71l-1.41 1.41L7.86 12l-1.41-1.41 2.86-2.86L11 6.29l1.41 1.41zm2 8.86h-4v-1.14l1.45-1.45L11 14.71l-3.84-3.85 1.42-1.42L13 12.29l1.41-1.41 1.42 1.42 2.86 2.86-1.42 1.42-2.86-2.86z"/>
                            </svg>


                            <span class="side-menu__label">
                            {{trans('index.settings')}}
                        </span>
                            <i class="angle fe fe-chevron-down"></i>
                            </svg>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('coach.calendar') }}">{{trans('index.settings')}}</a></li>
                        </ul>



                    </li>




				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
