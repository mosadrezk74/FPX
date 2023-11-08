@extends('Dashboard.layouts.master')

@section('title')
    {{trans('Dashboard/main-sidebar_trans.clubs')}}
@stop

@section('css')

    <link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection






    @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Dashboard/main-sidebar_trans.clubs')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ { {{trans('clubs.veiw_all_clubs')}}</span>
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
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                                        {{trans('clubs.add_club')}}
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap" id="example1">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0">{{trans('clubs.image')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('clubs.name')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('clubs.date')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('clubs.created_at')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('clubs.process')}}</th>


                                         </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (App::getLocale() == 'ar') { ?>
                                        @foreach($clubs as $club)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img width="50px" height="50px" alt="image"
                                                         src="{{ asset('uploads/club_logo/' . $club->image) }}"
                                                    />
                                                </td>
                                                <td><a href="{{route('club.show',$club->id)}}">{{$club->name_ar}}</a> </td>
                                                <td>{{ $club->date }}</td>
                                                <td>{{ $club->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <form action="{{ route('club.destroy',  $club->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{ route('club.edit',  $club->id) }}"
                                                           class="btn btn-success btn-sm">
                                                            Edit
                                                        </a>

                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <?php } else { ?>
                                        @foreach($clubs as $club)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img width="50px" height="50px" alt="image"
                                                         src="{{ asset('uploads/club_logo/' . $club->image) }}"
                                                    />
                                                </td>
                                                <td><a href="{{route('club.show',$club->id)}}">{{$club->name_en}}</a> </td>
                                                <td>{{ $club->date }}</td>
                                                <td>{{ $club->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <form action="{{ route('club.destroy',  $club->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{ route('club.edit',  $club->id) }}"
                                                           class="btn btn-success btn-sm">
                                                            Edit
                                                        </a>

                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <?php } ?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






                <!-- Modal  add-->

                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{trans('clubs.add_club')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('club.store') }}" method="post" autocomplete="off" enctype="multipart/form-data" >
                                @csrf
                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('clubs.name_ar')}}</label>
                                    <input type="text" name="name_ar" class="form-control">
                                </div>

                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('clubs.name_en')}}</label>
                                    <input type="text" name="name_en" class="form-control">
                                </div>
                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('clubs.image_upload')}}</label>
                                    <input type="file" name="image" class="form-control" >
                                </div>

                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('clubs.date')}}</label>
                                    <input type="text" name="date" class="form-control">
                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('clubs.close')}}</button>
                                    <button type="submit" class="btn btn-primary">{{trans('clubs.add_club')}}</button>
                                </div>
                            </form>
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
