@extends('Dashboard.layouts.master')
@section('title')
    Players
@stop



@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('player.players')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('player.show')}}</span>

            </div>
        </div>
    </div>
 @endsection
@section('content')
    @include('Dashboard.messages_alert')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card"  >

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.name')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.match')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.position')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.club')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.Goals')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.assists')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.dribble')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.keyPasses')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.xg')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.xa')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.da')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.da')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.da')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.da')}}</th>



                            </tr>
                            </thead>
                            <tbody>

                            @foreach($stats as $stat)
                                    <tr>
                                        <td>{{$stat->Jersey}}</td>
                                        <td>{{$stat->Name}}</td>
                                        <td>{{$stat->Weightkg}}</td>
                                        <td>{{$stat->Heightcm}}</td>
                                        <td>{{$stat->Age}}</td>
                                        <td>{{$stat->Citizenship}}</td>
                                        <td>{{$stat->Team}}</td>
                                        <td>{{$stat->Citizenship}}</td>
                                        <td>{{$stat->Position}}</td>
                                        <td>{{$stat->total_play_timein}}</td>
                                        <td>{{$stat->average_play_timemin}}</td>
                                        <td>{{$stat->Appearances}}</td>
                                        <td>{{$stat->redCards}}</td>
                                        <td>{{$stat->yellowCards}}</td>
                                        <td>{{$stat->totalGoals}}</td>

                                    </tr>

                             @endforeach



                            </tbody>

                        </table>

                        {{ $stats->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


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


