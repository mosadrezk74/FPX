@extends('Dashboard.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('Dashboard/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
<title>{{trans('Dashboard/main-sidebar_trans.admin_dashboard')}}</title>
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
                            @if(App::getLocale() == "ar")
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> مرحبا يا  {{Auth::user()->name_ar}} </h2>
                            @else
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Welcome {{Auth::user()->name_en}} </h2>
                            @endif
						</div>
					</div>

				</div>
				<!-- /breadcrumb -->
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
                            <h5 class="tx-13 tx-white-8 mb-3">مجموع اللاعبين</h5>

                                <h3 class="counter mb-0 text-white">{{$count}}</h3>
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
                <h6 class="card-title">أخر اللاعبين المضافين</h6>
                <span class="d-block mg-b-10 text-muted tx-12">اخر 10 لاعبين مضافين </span>
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


    </div>
    </div>
    <!-- Container closed -->
@endsection




