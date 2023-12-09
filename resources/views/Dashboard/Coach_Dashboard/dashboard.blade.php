@extends('Dashboard.layouts.master')

@section('page-header')
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
                        <div>
                            @if(App::getlocale() == 'ar')
                                <p class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> مرحبا  {{Auth::user()->name_ar}} </p>
                            @else
                                <p class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Welcome {{Auth::user()->name_en}} </p>
                            @endif
                        </div>
					</div>

					<div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">{{trans('index.club')}}</label>
							<div class="main-star">
								@if(App::getlocale() == 'ar')
								<a href="{{route('club.show' , $coach->club->id )}}">
								<h6>{{$coach->club->name_ar}}</h6>
								</a>
								@else
									<a href="{{route('club.show' , $coach->club->id )}}">
										<h6>{{$coach->club->name_en}}</h6>
									</a>
								@endif

							</div>
						</div>
						<div>
							<label class="tx-13">{{trans('index.day')}}</label>
							@if(app::getlocale() == 'ar')
							<h6>{{$dayOfWeekArabic}}</h6>
							@else
								<h6>{{$dayOfWeekEnglish}}</h6>
							@endif
						</div>
						<div id="real-time-clock">
							<label class="tx-13">{{trans('index.time')}}</label>
							<h6>{{$time}}</h6>
						</div>

						<div>
							<label class="tx-13">{{trans('index.date')}}</label>
							<h6>{{date('Y-m-d')}}</h6>
						</div>
					</div>

				</div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon">
                            <i class="icon icon-people"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="tx-13 tx-white-8 mb-3">عدد اللاعبين</h5>
                            <h2 class="counter mb-0 text-white">{{$count_p}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-warning">
                            <i class="icon icon-rocket"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="tx-13 tx-white-8 mb-3">Total Sales</h5>
                            <h2 class="counter mb-0 text-white">1765</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-success-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-primary">
                            <i class="icon icon-docs"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="tx-13 tx-white-8 mb-3">Total Projects</h5>
                            <h2 class="counter mb-0 text-white">846</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-warning-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-success">
                            <i class="icon icon-emotsmile"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="tx-13 tx-white-8 mb-3">Happy Customers</h5>
                            <h2 class="counter mb-0 text-white">7253</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

<div class="row row-sm row-deck">
    <div class="col-md-12 col-lg-4 col-xl-4">
        <div class="card card-dashboard-eight pb-2">
            <h6 class="card-title">أفضل اللاعبين</h6>
            <span class="d-block mg-b-10 text-muted tx-12">أفضل 10 لاعبين</span>
            <div class="list-group">
                @foreach($players as $player)
                <div class="list-group-item border-top-0">
                    <img  alt="image" class="flag-icon  flag-icon-squared flag-icon-lg"
                         src="{{ asset('uploads/players/'. $player->photo) }}" />

                    <p>{{$player->name_ar}}</p><span><a href="">{{$player->club->name_ar}}</a></span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-8 col-xl-8">
        <div class="card card-table-two">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-1">ترتيب الدوري المصري</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
             <div class="table-responsive country-table">
                <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                    <thead>
                    <tr>
                        <th class="wd-lg-10p">ترتيب</th>
                        <th class="wd-lg-30p">اسم الفريق</th>
                        <th class="wd-lg-10p tx-right">لعب</th>
                        <th class="wd-lg-10p tx-right">فوز</th>
                        <th class="wd-lg-10p tx-right">تعادل</th>
                        <th class="wd-lg-10p tx-right">خسارة</th>
                        <th class="wd-lg-15p tx-right">نقاط</th>
                    </tr>
                    </thead>
                    <tbody>
                     <tr>
                        <td class="tx-right tx-medium tx-inverse">1</td>

                        <td class="tx-right tx-medium tx-inverse">
                            <img src="{{URL::asset('Dashboard/logo/1.jpg')}}" class="wd-30 ht-30" alt="img">
                            الأهلي</td>
                        <td class="tx-right tx-medium tx-inverse">10</td>
                        <td class="tx-right tx-medium tx-inverse">9</td>
                        <td class="tx-right tx-medium tx-inverse">1</td>
                        <td class="tx-right tx-medium tx-inverse">0</td>
                        <td class="tx-right tx-medium tx-danger tx-bold">28</td>
                    </tr>
                    <tr>
                        <td class="tx-right tx-medium tx-inverse">2</td>

                        <td class="tx-right tx-medium tx-inverse">
                            <img src="{{URL::asset('Dashboard/logo/2.jpg')}}" class="wd-30 ht-30" alt="img">
                            بيراميدز</td>
                        <td class="tx-right tx-medium tx-inverse">10</td>
                        <td class="tx-right tx-medium tx-inverse">8</td>
                        <td class="tx-right tx-medium tx-inverse">1</td>
                        <td class="tx-right tx-medium tx-inverse">1</td>
                        <td class="tx-right tx-medium tx-danger tx-bold">25</td>
                    </tr>
                    <tr>
                        <td class="tx-right tx-medium tx-inverse">3</td>

                        <td class="tx-right tx-medium tx-inverse">
                            <img src="{{URL::asset('Dashboard/logo/3.jpg')}}" class="wd-30 ht-30" alt="img">
                            مودرن فيوتشر</td>
                        <td class="tx-right tx-medium tx-inverse">10</td>
                        <td class="tx-right tx-medium tx-inverse">6</td>
                        <td class="tx-right tx-medium tx-inverse">4</td>
                        <td class="tx-right tx-medium tx-inverse">0</td>
                        <td class="tx-right tx-medium tx-danger tx-bold">22</td>
                    </tr>
                    <tr>
                        <td class="tx-right tx-medium tx-inverse">4</td>

                        <td class="tx-right tx-medium tx-inverse">
                            <img src="{{URL::asset('Dashboard/logo/4.jpg')}}" class="wd-30 ht-30" alt="img">
                            سموحة</td>
                        <td class="tx-right tx-medium tx-inverse">10</td>
                        <td class="tx-right tx-medium tx-inverse">5</td>
                        <td class="tx-right tx-medium tx-inverse">3</td>
                        <td class="tx-right tx-medium tx-inverse">2</td>
                        <td class="tx-right tx-medium tx-danger tx-bold">18</td>
                    </tr>
                    <tr>
                        <td class="tx-right tx-medium tx-inverse">5</td>

                        <td class="tx-right tx-medium tx-inverse">
                            <img src="{{URL::asset('Dashboard/logo/5.jpg')}}" class="wd-30 ht-30" alt="img">
                            الزمالك</td>
                        <td class="tx-right tx-medium tx-inverse">10</td>
                        <td class="tx-right tx-medium tx-inverse">5</td>
                        <td class="tx-right tx-medium tx-inverse">0</td>
                        <td class="tx-right tx-medium tx-inverse">5</td>
                        <td class="tx-right tx-medium tx-danger tx-bold">15</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
<div class="row row-sm">
    <div class="col-xl-4 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header pb-1">
                <h3 class="card-title mb-2">Recent Customers</h3>
                <p class="tx-12 mb-0 text-muted">A customer is an individual or business that purchases the goods service has evolved to include real-time</p>
            </div>
            <div class="card-body p-0 customers mt-1">
                <div class="list-group list-lg-group list-group-flush">
                    <div class="list-group-item list-group-item-action" href="#">
                        <div class="media mt-0">
                            <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('Dashboard/img/faces/3.jpg')}}" alt="Image description">
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <div class="mt-0">
                                        <h5 class="mb-1 tx-15">Samantha Melon</h5>
                                        <p class="mb-0 tx-13 text-muted">User ID: #1234 <span class="text-success ml-2">Paid</span></p>
                                    </div>
                                    <span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark1" class="wd-100p"></div>
													</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-action" href="#">
                        <div class="media mt-0">
                            <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('Dashboard/img/faces/11.jpg')}}" alt="Image description">
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <div class="mt-1">
                                        <h5 class="mb-1 tx-15">Jimmy Changa</h5>
                                        <p class="mb-0 tx-13 text-muted">User ID: #1234 <span class="text-danger ml-2">Pending</span></p>
                                    </div>
                                    <span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark2" class="wd-100p"></div>
													</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-action" href="#">
                        <div class="media mt-0">
                            <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('Dashboard/img/faces/17.jpg')}}" alt="Image description">
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <div class="mt-1">
                                        <h5 class="mb-1 tx-15">Gabe Lackmen</h5>
                                        <p class="mb-0 tx-13 text-muted">User ID: #1234<span class="text-danger ml-2">Pending</span></p>
                                    </div>
                                    <span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark3" class="wd-100p"></div>
													</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-action" href="#">
                        <div class="media mt-0">
                            <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('Dashboard/img/faces/15.jpg')}}" alt="Image description">
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <div class="mt-1">
                                        <h5 class="mb-1 tx-15">Manuel Labor</h5>
                                        <p class="mb-0 tx-13 text-muted">User ID: #1234<span class="text-success ml-2">Paid</span></p>
                                    </div>
                                    <span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark4" class="wd-100p"></div>
													</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-action br-br-7 br-bl-7" href="#">
                        <div class="media mt-0">
                            <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('Dashboard/img/faces/6.jpg')}}" alt="Image description">
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <div class="mt-1">
                                        <h5 class="mb-1 tx-15">Sharon Needles</h5>
                                        <p class="b-0 tx-13 text-muted mb-0">User ID: #1234<span class="text-success ml-2">Paid</span></p>
                                    </div>
                                    <span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark5" class="wd-100p"></div>
													</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header pb-1">
                <h3 class="card-title mb-2">Sales Activity</h3>
                <p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their goals and objective</p>
            </div>
            <div class="product-timeline card-body pt-2 mt-1">
                <ul class="timeline-1 mb-0">
                    <li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Products</span> <a href="#" class="float-left tx-11 text-muted">3 days ago</a>
                        <p class="mb-0 text-muted tx-12">1.3k New Products</p>
                    </li>
                    <li class="mt-0"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Sales</span> <a href="#" class="float-left tx-11 text-muted">35 mins ago</a>
                        <p class="mb-0 text-muted tx-12">1k New Sales</p>
                    </li>
                    <li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Revenue</span> <a href="#" class="float-left tx-11 text-muted">50 mins ago</a>
                        <p class="mb-0 text-muted tx-12">23.5K New Revenue</p>
                    </li>
                    <li class="mt-0"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Profit</span> <a href="#" class="float-left tx-11 text-muted">1 hour ago</a>
                        <p class="mb-0 text-muted tx-12">3k New profit</p>
                    </li>
                    <li class="mt-0"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
                        <p class="mb-0 text-muted tx-12">15% increased</p>
                    </li>
                    <li class="mt-0 mb-0"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
                        <p class="mb-0 text-muted tx-12">1.5k reviews</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header pb-0">
                <h3 class="card-title mb-2">Recent Orders</h3>
                <p class="tx-12 mb-0 text-muted">An order is an investor's instructions to a broker or brokerage firm to purchase or sell</p>
            </div>
            <div class="card-body sales-info ot-0 pt-0 pb-0">
                <div id="chart" class="ht-150"></div>
                <div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
                    <div class="col-md-6 col">
                        <p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>Delivered</p>
                        <h3 class="mb-1">5238</h3>
                        <div class="d-flex">
                            <p class="text-muted ">Last 6 months</p>
                        </div>
                    </div>
                    <div class="col-md-6 col">
                        <p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Cancelled</p>
                        <h3 class="mb-1">3467</h3>
                        <div class="d-flex">
                            <p class="text-muted">Last 6 months</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center pb-2">
                            <p class="mb-0">Total Sales</p>
                        </div>
                        <h4 class="font-weight-bold mb-2">$7,590</h4>
                        <div class="progress progress-style progress-sm">
                            <div class="progress-bar bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="d-flex align-items-center pb-2">
                            <p class="mb-0">Active Users</p>
                        </div>
                        <h4 class="font-weight-bold mb-2">$5,460</h4>
                        <div class="progress progress-style progress-sm">
                            <div class="progress-bar bg-danger-gradient wd-75" role="progressbar"  aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row close -->

</div>
</div>
<!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Moment js -->
    <script src="{{URL::asset('Dashboard/plugins/raphael/raphael.min.js')}}"></script>
    <!--Internal  Flot js-->
    <script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
    <script src="{{URL::asset('Dashboard/js/dashboard.sampledata.js')}}"></script>
    <script src="{{URL::asset('Dashboard/js/chart.flot.sampledata.js')}}"></script>
    <!--Internal Apexchart js-->
    <script src="{{URL::asset('Dashboard/js/apexcharts.js')}}"></script>
    <!-- Internal Map -->
    <script src="{{URL::asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{URL::asset('Dashboard/js/modal-popup.js')}}"></script>
    <!--Internal  index js -->
    <script src="{{URL::asset('Dashboard/js/index.js')}}"></script>
    <script src="{{URL::asset('Dashboard/js/jquery.vmap.sampledata.js')}}"></script>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            hours = (hours < 10) ? "0" + hours : hours;
            minutes = (minutes < 10) ? "0" + minutes : minutes;
            seconds = (seconds < 10) ? "0" + seconds : seconds;

            var timeElement = document.getElementById("real-time-clock");
            if (timeElement) {
                timeElement.querySelector("h6").innerHTML = hours + ":" + minutes + ":" + seconds;
            }
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>

@endsection
