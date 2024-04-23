@extends('Dashboard.layouts.master')
@section('title')
    {{trans('index.rating')}}
@stop

@section('css')
    <link href="{{asset('Dashboard/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('Dashboard/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('Dashboard/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('Dashboard/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('Dashboard/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('Dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('index.rating')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{trans('index.veiw_all')}}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card card-dashboard-eight pb-2">
                    <div class="main-content-label tx-12 mg-b-15">
                        <img src="https://i.ibb.co/FmyYYR3/free-icon-ball-444.png" alt="free-icon-ball-444" border="0" style="width: 25px; height: 25px">
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
                                <th>{{intval($player->stat->CrdY*$player->stat->MP)}}</th>
                            </tr>


                            <tr>
                                <th>
                                    <img src="{{asset('Dashboard\r.png')}}" style="width: 10px;height: 15px"  alt="Yellow Card">

                                    كرت أحمر</th>
                                <th>{{intval($player->stat->CrdR*$player->stat->MP)}}</th>
                            </tr>
                            <tr>
                                <th>ترتيبك في الفريق</th>
                                <th>
                                    <p class="card-text">

                                        {{ $rank }} #

                                    </p>
                                </th>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card card-dashboard-eight pb-2">
                    <div class="main-content-label tx-12 mg-b-15">
                        <img src="https://i.ibb.co/c1KT8KH/free-icon-ball-443.png" alt="free-icon-ball-443" border="0" style="width: 25px; height: 25px">
                        أفضل مباراة
                    </div>
                    <div class="ht-200 ht-lg-250">
                        <table class="table" id="example1">
                            <tr>
                                <th>ضد</th>
                                @foreach($clubs as $club)
                                <th>
                                    <img src="{{asset($club->image)}}" style="width: 25px;height: 25px"  alt="Yellow Card">
                                    {{$club->name_ar}}
                                </th>
                                @endforeach

                            </tr>

                            <tr>
                                <th>دقائق اللعب</th>
                                <th>{{mt_rand(65,90)}}</th>
                            </tr>


                            <tr>
                                <th>
                                    هدف
                                </th>
                                <th>{{mt_rand(0,3)}}</th>
                            </tr>
                            <tr>
                                <th>
                                   صناعة
                                </th>
                                <th>{{mt_rand(0,3)}}</th>
                            </tr>
                            <tr>
                                <th>التقييم</th>
                                <th>
                                    <p class="card-text">
                                        @if(rand() > 5)
                                            <span class="bg-success text-white">{{rand(8,10)}}</span>
                                        @endif
                                    </p>
                                </th>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card card-dashboard-eight pb-2">
                    <div class="main-content-label tx-12 mg-b-15">
                        <img src="https://i.ibb.co/MgWL0bz/free-icon-winner-488.png" alt="free-icon-winner-488" border="0" style="width: 25px; height: 25px">
                        تصنيف في الفريق
                    </div>
                    <div class="ht-200 ht-lg-250">
                        <table class="table" id="example1">
                            <tr title="رقم {{$rankPass}} في التمرير في الفريق" >
                                <th>المركز</th>
                                @if($player->position == 0)
                                    <th>{{trans('player.goalkeeper')}}</th>
                                @elseif($player->position == 1)
                                    <th>{{trans('player.defender')}}</th>
                                @elseif($player->position == 2)
                                    <th>{{trans('player.mid')}}</th>
                                @elseif($player->position == 3)
                                    <th>{{trans('player.forward')}}</th>

                                @endif
                            </tr>

                            <tr title="رقم {{$rankPass}} في التمرير في الفريق" >
                                <th>التمرير</th>
                                <th>{{$rankPass}}#</th>
                            </tr>

                            <tr title="رقم {{$rankShoot}} كأكثر اللاعبين في التسديد علي المرمي " >
                                <th>التسديد</th>
                                <th>{{$rankShoot}}# </th>
                            </tr>

                            <tr title="{{$player->stat->Goals}} هدف " >
                                <th>
                                    أهداف
                                <th>{{$TopGoals}}#</th>
                            </tr>
                            <tr title="{{intval($player->stat->Assists*$player->stat->MP)}} أسيست " >
                                <th>
                                    صناعة أهداف
                                </th>
                                <th>{{$TopAssists}}#</th>
                            </tr>



                        </table>
                    </div>
                </div>
            </div>

            <!--div-->
            <div class="col-xl-12">
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h4 class="content-title mb-0 my-auto">تقييم</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/تقييم المبارايات</span>
                        </div>
                    </div>
                </div>

                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive text-center ">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">الجولة</th>
                                    <th class="wd-15p border-bottom-0">ضد</th>
                                    <th class="wd-15p border-bottom-0">عدد الدقائق</th>
                                    <th class="wd-15p border-bottom-0">هدف</th>
                                    <th class="wd-20p border-bottom-0">مساعدة</th>
                                    <th class="wd-25p border-bottom-0">تقييم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($random_clubs as $club)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>  vs
                                        <img src="{{asset($club->image)}}" style="width: 10px;height: 15px"  alt="Yellow Card">
                                        {{$club->name_ar}}</td>
                                    <td>{{mt_rand(50,90)}}</td>
                                    <td>{{mt_rand(0,3)}}</td>
                                    <td>{{mt_rand(0,3)}}</td>
                                    <td>
                                        <span><a href="">{{ mt_rand(50, 100) / 10 }}</a></span>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div><!-- bd -->

                </div><!-- bd -->
            </div>
            <!--/div-->


        </div>
    </div>



    </div>

    <!-- row closed -->

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

@endsection
