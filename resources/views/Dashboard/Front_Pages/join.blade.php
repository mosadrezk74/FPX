@extends('Dashboard.layouts.master')

@section('title')
    {{trans('Dashboard/main-sidebar_trans.clubs')}}
@stop



@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">ادارة الصفحات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ انضم الينا</span>
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
            <div class="card"  >

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                 <th class="wd-15p border-bottom-0">{{trans('index.name')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('index.country')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('index.phone')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('index.email')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('index.desc')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('index.status')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('index.action')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('index.since')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->country}}</td>
                                    <td>
                                        <a href="tel:{{$message->phone}}">
                                        {{$message->phone}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="mailto:{{$message->email}}">
                                        {{$message->email}}
                                        </a>
                                    </td>
                                    <td title="{{$message->descr}}" >{{ \Str::limit($message->descr, 30) }}</td>
                                    <td>
                                            @if ($message->status == 1)
                                                <a href="{{ route('join.toggleStatus', ['status' => 0, 'id' => $message->id]) }}"

                                                   class="btn btn-success btn-sm">Seen</a>
                                            @elseif ($message->status == 0)
                                                <a href="{{ route('join.toggleStatus', ['status' => 1, 'id' => $message->id]) }}"
                                                   class="btn btn-primary btn-sm">Pending</a>
                                            @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('join.destroy',  $message->id) }}"
                                           class="btn btn-danger-gradient btn-sm">
                                            Delete
                                        </a>
                                    </td>

                            @endforeach
                                    <td>{{ $message->created_at->diffForHumans() }}</td>

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
