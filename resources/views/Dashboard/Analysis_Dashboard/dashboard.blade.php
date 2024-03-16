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

            <div class="card text-center">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">عدد المباريات </h1>
                    <h1 class="text-black">{{ $player->stat->Appearances }}</h1>
                </div>
            </div>
            <hr>

        </div>

        <div class="col-lg-3 col-md-3">
            <hr>

            <div class="card text-center">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">عدد أهدافك</h1>
                    <h1 class="text-black">{{ $player->stat->totalGoals }}</h1>
                </div>
            </div>
            <hr>

        </div>
        <div class="col-lg-3 col-md-3">
            <hr>

            <div class="card text-center">

                <div class="card-body">
                    <h1 class="tx-13 tx-black-8 mb-3" style="font-weight: bold;">عدد اسيستاتك</h1>
                    <h1 class="text-black">{{ $player->stat->goalAssists }}</h1>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-lg-3 col-md-3">
            <hr>

            <div class="card  text-center">

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
                    احصائيات عامه
                </div>
                <div class="ht-200 ht-lg-250">
                    <div class="list-group-item border-top-0">
                            <p>القيمه السوقيه</p>
                        <span>2.4M$</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>الطول</p>
                        <span>{{$player->stat->Heightcm}}</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>الوزن</p>
                        <span>{{$player->stat->Weightkg}}</span>
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
                    احصائيات عامه
                </div>
                <div class="ht-200 ht-lg-250">
                    <div class="list-group-item border-top-0">
                            <p>القيمه السوقيه</p>
                        <span>2.4M$</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>الطول</p>
                        <span>{{$player->stat->Heightcm}}</span>
                    </div>
                    <div class="list-group-item border-top-0">
                        <p>الوزن</p>
                        <span>{{$player->stat->Weightkg}}</span>
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
    <script>

        'use strict';

        var clubs = {!! json_encode($clubs) !!};
        const won = [];
        const draw = [];
        const lose = [];
        const total=[];
        if (Array.isArray(clubs)) {
            clubs.forEach(function (club) {
                won.push(club.won);
                draw.push(club.draw);
                lose.push(club.lose);
                total.push(club.total);
            });
        }
        var ctx1 = document.getElementById('chartBar1').getContext('2d');

        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Win', 'Draw', 'Lose'],
                datasets: [{
                    label: '# of total',
                    data: [won, draw, lose],
                    backgroundColor: '#285cf7'
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 10,
                            max: 12,
                            fontColor: "rgb(171, 167, 167,0.9)",
                        },
                        gridLines: {
                            display: true,
                            color: 'rgba(171, 167, 167,0.2)',
                            drawBorder: false
                        },
                    }],
                    xAxes: [{
                        barPercentage: 0.6,
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11,
                            fontColor: "rgb(171, 167, 167,0.9)",
                        },
                        gridLines: {
                            display: true,
                            color: 'rgba(171, 167, 167,0.2)',
                            drawBorder: false
                        },
                    }]
                }
            }
        });
        //*###########################################################################*//
        //*###########################################################################*//
        var datapie = {
            labels: ['Win', 'Draw', 'Lose'],

            datasets: [{
                data: [won, draw, lose],
                backgroundColor: ['#285cf7', '#f10075', '#8500ff', '#7987a1', '#74de00']
            }]
        };

        var optionpie = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false,
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };
        var ctx7 = document.getElementById('chartDonut');
        var myPieChart7 = new Chart(ctx7, {
            type: 'pie',
            data: datapie,
            options: optionpie
        });
        //################################################################################//
        //################################################################################//
        var ctx6 = document.getElementById('chartPie');
        var myPieChart6 = new Chart(ctx6, {
            type: 'doughnut',
            data: datapie,
            options: optionpie
        });

    </script>





@endsection
