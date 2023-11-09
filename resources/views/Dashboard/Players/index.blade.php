@extends('Dashboard.layouts.master')
@section('title')
    Players
@stop
@section('css')
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Players</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Show All</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <a href="{{route('player.create')}}" class="btn btn-primary" role="button"
                       aria-pressed="true">Add Player</a>
                </div>

                <div class="card-body">
    <div class="col-lg-12 col-md-12">
        <div class="card" id="basic-alert">
            <div class="card-body">
                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-1">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                                data-toggle="tab">حراس المرمي</a></li>
                                        <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">المدافعين</a>
                                        </li>
                                        <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">لاعبي الوسط</a>
                                        </li>
                                        <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">المهاجمين
                                            </a></li>
                                        <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">المدرب
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                <div class="tab-content">


                                    {{-- Start Invices Patient --}}

                                    <div class="tab-pane active" id="tab1">

                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الصورة</th>
                                                    <th>اسم اللاعب</th>
                                                    <th>الفريق</th>
                                                    <th>العمر</th>
                                                    <th>الجنسية</th>
                                                    <th>المركز</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    @foreach($players as $player)

                                                        <td>1</td>
                                                        <td>{{$player->name}}</td>
                                                        <td>{{$player->Phone}}</td>
                                                        <td>{{$player->email}}</td>
                                                        <td>{{$player->Date_Birth}}</td>
                                                        <td>{{$player->Gender == 1 ? '`ذكر' :  'انثي'}}</td>
                                                        <td>{{$player->Blood_Group}}</td>
                                                    @endforeach

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- End Invices Patient --}}


                                    {{-- Start Invices Patient --}}

                                    <div class="tab-pane" id="tab2">

                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الصورة</th>
                                                    <th>اسم اللاعب</th>
                                                    <th>الفريق</th>
                                                    <th>العمر</th>
                                                    <th>الجنسية</th>
                                                    <th>المركز</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    @foreach($players as $player)

                                                        <td>1</td>
                                                        <td>{{$player->name}}</td>
                                                        <td>{{$player->Phone}}</td>
                                                        <td>{{$player->email}}</td>
                                                        <td>{{$player->Date_Birth}}</td>
                                                        <td>{{$player->Gender == 1 ? '`ذكر' :  'انثي'}}</td>
                                                        <td>{{$player->Blood_Group}}</td>
                                                    @endforeach

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- End Invices Patient --}}



                                    {{-- Start Receipt Patient  --}}

                                    <div class="tab-pane" id="tab3">
                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الصورة</th>
                                                    <th>اسم اللاعب</th>
                                                    <th>الفريق</th>
                                                    <th>العمر</th>
                                                    <th>الجنسية</th>
                                                    <th>المركز</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    @foreach($players as $player)

                                                        <td>1</td>
                                                        <td>{{$player->name}}</td>
                                                        <td>{{$player->Phone}}</td>
                                                        <td>{{$player->email}}</td>
                                                        <td>{{$player->Date_Birth}}</td>
                                                        <td>{{$player->Gender == 1 ? '`ذكر' :  'انثي'}}</td>
                                                        <td>{{$player->Blood_Group}}</td>
                                                    @endforeach

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- End Receipt Patient  --}}


                                    {{-- Start payment accounts Patient --}}
                                    <div class="tab-pane" id="tab4">
                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الصورة</th>
                                                    <th>اسم اللاعب</th>
                                                    <th>الفريق</th>
                                                    <th>العمر</th>
                                                    <th>الجنسية</th>
                                                    <th>المركز</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    @foreach($players as $player)

                                                        <td>1</td>
                                                        <td>{{$player->name}}</td>
                                                        <td>{{$player->Phone}}</td>
                                                        <td>{{$player->email}}</td>
                                                        <td>{{$player->Date_Birth}}</td>
                                                        <td>{{$player->Gender == 1 ? '`ذكر' :  'انثي'}}</td>
                                                        <td>{{$player->Blood_Group}}</td>
                                                    @endforeach

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <br>

                                    </div>

                                    {{-- End payment accounts Patient --}}


                                    <div class="tab-pane" id="tab5">
                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الصورة</th>
                                                    <th>اسم اللاعب</th>
                                                    <th>الفريق</th>
                                                    <th>العمر</th>
                                                    <th>الجنسية</th>
                                                    <th>المركز</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    @foreach($players as $player)

                                                        <td>1</td>
                                                        <td>{{$player->name}}</td>
                                                        <td>{{$player->Phone}}</td>
                                                        <td>{{$player->email}}</td>
                                                        <td>{{$player->Date_Birth}}</td>
                                                        <td>{{$player->Gender == 1 ? '`ذكر' :  'انثي'}}</td>
                                                        <td>{{$player->Blood_Group}}</td>
                                                    @endforeach

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Prism Precode -->
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>


    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('Dashboard/js/table-data.js')}}"></script>

    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for(var i in checkboxes){
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>


    <script type="text/javascript">
        $(function () {
            $("#btn_delete_all").click(function () {
                var selected = [];
                $("#example input[name=delete_select]:checked").each(function () {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
    </script>



@endsection
