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



    </div>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-3">
            <hr>

            <div class="card text-center bg-success-gradient text-white ">
                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">عدد المباريات </h1>
                    <h1 class="text-black">{{ $player->stat->MP }}</h1>
                </div>
            </div>
            <hr>
        </div>

        <div class="col-lg-3 col-md-3">
            <hr>

            <div class="card text-center bg-success-gradient text-white ">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">عدد أهدافك</h1>
                    <h1 class="text-black">{{ $player->stat->Goals }}</h1>
                </div>
            </div>
            <hr>

        </div>
        <div class="col-lg-3 col-md-3">
            <hr>

            <div class="card text-center bg-success-gradient text-white ">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">عدد اسيستاتك</h1>
                    <h1 class="text-black">{{ intval($player->stat->Assists * $player->stat->MP)}}</h1>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-lg-3 col-md-3">
            <hr>

            <div class="card text-center bg-success-gradient text-white ">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">متوسط التقييم</h1>
                    <h1 class="text-black">{{ mt_rand(50, 100) / 10 }}</h1>
                </div>
            </div>
            <hr>
        </div>

        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <div class="main-content-label tx-12 mg-b-15">
                    احصائيات عامه
                </div>
                <div class="ht-200 ht-lg-250">
                    <div class="list-group-item border-top-0" title="Dollar" >
                        <p>القيمه السوقيه</p>
                        <span>{{$player->stat->SoT*10}}M</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>الطول</p>
                        <span>{{ mt_rand(160, 200) }}</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>الوزن</p>
                        <span>{{ mt_rand(75, 90)}}</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>العمر</p>
                        <span>{{$player->stat->Age}}</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>الجنسيه</p>
                        <span>{{$player->nationality}}</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <div class="main-content-label tx-12 mg-b-15">
                    تقييم أخر 5 مباريات
                </div>
                <div class="ht-200 ht-lg-250">

                    @foreach($random_clubs as $rand)
                    <div class="list-group-item border-top-0">
                            <p>{{$player->name_ar}} vs {{$rand->name_ar}}</p>
                            <span><a href="">{{ mt_rand(50, 100) / 10 }}</a></span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <div class="main-content-label tx-12 mg-b-15">
                    المياريات
                </div>
                <div class="ht-200 ht-lg-250">
                    <table class="table" id="example1">
                        <tr>
                            <th>عدد المباريات</th>
                            <th>{{$player->stat->MP}}</th>
                        </tr>

                        <tr>
                            <th>عدد الدقائق</th>
                            <th>{{$player->stat->Min}}</th>
                        </tr>


                        <tr>
                            <th>
                                <img src="{{asset('Dashboard\y.png')}}" style="width: 10px;height: 15px"  alt="Yellow Card">
                                كرت أصفر
                            </th>
                            <th>{{$player->stat->CrdY*100}}</th>
                        </tr>


                        <tr>
                            <th>
                                <img src="{{asset('Dashboard\r.png')}}" style="width: 10px;height: 15px"  alt="Yellow Card">

                                كرت أحمر</th>
                            <th>{{$player->stat->CrdR}}</th>
                        </tr>
                        <tr>
                            <th>التقييم</th>
                            <th>
                                <p class="card-text">
                                    @if(rand() > 5)
                                        <span class="bg-success text-white">{{rand(5,10)}}</span>
                                    @elseif(rand()<5)
                                        <span class="bg-danger text-white">{{rand(0,4)}}</span>
                                    @endif
                                </p>
                            </th>
                        </tr>


                    </table>
                </div>
            </div>
        </div>





    </div>


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
