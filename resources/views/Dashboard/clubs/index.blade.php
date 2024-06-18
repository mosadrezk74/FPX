@extends('Dashboard.layouts.master')

@section('title')
    {{trans('Dashboard/main-sidebar_trans.clubs')}}
@stop



    @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Dashboard/main-sidebar_trans.clubs')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('clubs.veiw_all_clubs')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
				<!-- breadcrumb -->
 @section('content')
    @include('Dashboard.Clubs.messages_alert')

    <!-- row -->

                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap" id="example1">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0">{{trans('clubs.image')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('clubs.name')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('clubs.date')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('index.status')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clubs as $club)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img width="50px" height="50px" alt="image" src="{{$club->image }}"
                                                    />
                                                </td>
                                                @if(App::getLocale() == 'ar')
                                                    <td><a href="{{route('club.show',$club->id)}}">{{$club->name_ar}}</a> </td>
                                                @else
                                                    <td><a href="{{route('club.show',$club->id)}}">{{$club->name_en}}</a> </td>
                                                @endif

                                                <td>{{ $club->date_of_est }}</td>
                                                <td>
                                                    @if ($club->status == 1)
                                                        <a href="{{ route('club.toggleStatus', ['status' => 0, 'id' => $club->id]) }}"

                                                           class="btn btn-success btn-sm">{{trans('index.Partener')}}</a>
                                                    @elseif ($club->status == 0)
                                                        <a href="{{ route('club.toggleStatus', ['status' => 1, 'id' => $club->id]) }}"
                                                           class="btn btn-danger btn-sm">{{trans('index.Not_Partener')}}</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





				<!-- row closed -->

			<!-- Container closed -->

		<!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
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

@endsection
