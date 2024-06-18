@extends('Dashboard.layouts.master')

@section('title')
     {{trans('site/index.contact')}}

@stop



@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                @if(App::getLocale() == 'ar')

                <h4 class="content-title mb-0 my-auto">صفحات الموقع</h4>

                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تواصل</span>
                @else
                    <h4 class="content-title mb-0 my-auto">Manage Pages</h4>
                    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/Contact </span>

                @endif

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
                @if(session('success'))
                    <div class="alert alert-danger">
                        {{ session('success') }}
                    </div>
                @endif
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

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$message->f_name}}</td>
                                    <td>{{$message->l_name}}</td>
                                     <td>
                                        <a href="tel:{{$message->phone}}">
                                            {{$message->number}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="mailto:{{$message->email}}">
                                            {{$message->email}}
                                        </a>
                                    </td>
                                    <td title="{{$message->message}}" >{{ \Str::limit($message->message, 50) }}</td>
                                    <td>
                                        @if ($message->status == 1)
                                            <a href="{{ route('contact.toggleStatus', ['status' => 0, 'id' => $message->id]) }}"

                                               class="btn btn-success btn-sm"> {{trans('index.seen')}}</a>
                                        @elseif ($message->status == 0)
                                            <a href="{{ route('contact.toggleStatus', ['status' => 1, 'id' => $message->id]) }}"
                                               class="btn btn-primary btn-sm"> {{trans('index.pending')}}</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('contact_delete',  $message->id) }}"
                                           class="btn btn-danger-gradient btn-sm">
                                            Delete
                                        </a>
                                    </td>

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
