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
     <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('player.players')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('player.show')}}</span>
                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!-- Outer Container -->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <a href="{{ route('player.create') }}" class="btn btn-primary" role="button" aria-pressed="true">{{trans('player.create_player')}}</a>
                </div>
                <div class="card-body pb-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search player or club.....">
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 col-md-12">
                        <div class="card" id="basic-alert">
                            <div class="card-body">
                                <div class="text-wrap">
                                    <div class="example">

                                        <div class="panel panel-primary tabs-style-1">
                                            <div class="tab-menu-heading">
                                                <div class="tabs-menu1">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs main-nav-line">
                                                        <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">{{trans('player.goalkeeper')}}</a></li>
                                                        <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">{{trans('player.defender')}}</a></li>
                                                        <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">{{trans('player.midfielder')}}</a></li>
                                                        <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">{{trans('player.forward')}}</a></li>
                                                     </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                                <div class="tab-content">
                                                    {{-- Start Goalkeeper --}}

                                                    <div class="tab-pane active" id="tab1">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover text-md-nowrap text-center player-table" data-position="0">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{{trans('player.photo_player')}}</th>
                                                                    <th>{{trans('player.name')}}</th>
                                                                    <th>{{trans('player.club_name')}}</th>
                                                                    <th>{{trans('player.age')}}</th>
                                                                    <th>{{trans('player.nationality')}}</th>
                                                                    <th>{{trans('player.process')}}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($players as $player)
                                                                    @if($player->position==0)
                                                                        <tr>
                                                                            <td>{{$player->shirt_number}}</td>
                                                                            <td>
                                                                                <img width="50px" height="50px" alt="image" src="{{ asset('uploads/players/'. $player->photo) }}" />
                                                                            </td>
                                                                            @if(App::getLocale() == 'ar')
                                                                                <td>{{$player->name_ar}}</td>
                                                                                <td>
                                                                                    <a href="{{ route('club.show',  $player->club->id) }}"> {{$player->club->name_ar}}</a>
                                                                                </td>
                                                                            @else
                                                                                <td>{{$player->name_en}}</td>
                                                                                <td>
                                                                                    <a href="{{ route('club.show',  $player->club->id) }}"> {{$player->club->name_en}}</a>
                                                                                </td>
                                                                            @endif
                                                                            <td>  {{ now()->diffInYears($player->age) }}  </td>
                                                                            <td>{{$player->nationality}}</td>
                                                                            <td>
                                                                                <form action="{{ route('player.destroy',  $player->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')

                                                                                    <a href="{{ route('player.edit',  $player->id) }}"
                                                                                       class="btn btn-success btn-sm">
                                                                                        {{trans('player.edit_player')}}
                                                                                    </a>

                                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                                        {{trans('player.delete_player')}}
                                                                                    </button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    {{-- End Goalkeeper --}}

                                                    {{-- Start Defender --}}
                                                    <div class="tab-pane" id="tab2">
                                                        <div class="table-responsive">

                                                            <table class="table table-hover text-md-nowrap text-center player-table" data-position="1">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{{trans('player.photo_player')}}</th>
                                                                    <th>{{trans('player.name')}}</th>
                                                                    <th>{{trans('player.club_name')}}</th>
                                                                    <th>{{trans('player.age')}}</th>
                                                                    <th>{{trans('player.nationality')}}</th>
                                                                    <th>{{trans('player.process')}}</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($players as $player)
                                                                    @if($player->position==1)
                                                                        <tr>
                                                                            <td>{{$player->shirt_number}}</td>
                                                                            <td>
                                                                                <img width="50px" height="50px" alt="image" src="{{ asset('uploads/players/'. $player->photo) }}" />
                                                                            </td>
                                                                            @if(App::getLocale() == 'ar')
                                                                                <td>{{$player->name_ar}}</td>
                                                                                <td>
                                                                                    <a href="{{ route('club.show',  $player->club->id) }}"> {{$player->club->name_ar}}</a>
                                                                                </td>
                                                                            @else
                                                                                <td>{{$player->name_en}}</td>
                                                                                <td>
                                                                                    <a href="{{ route('club.show',  $player->club->id) }}"> {{$player->club->name_en}}</a>
                                                                                </td>
                                                                            @endif
                                                                            <td>  {{ now()->diffInYears($player->age) }}  </td>
                                                                            <td>{{$player->nationality}}</td>
                                                                            <td>
                                                                                <form action="{{ route('player.destroy',  $player->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')

                                                                                    <a href="{{ route('player.edit',  $player->id) }}"
                                                                                       class="btn btn-success btn-sm">
                                                                                        {{trans('player.edit_player')}}
                                                                                    </a>

                                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                                        {{trans('player.delete_player')}}
                                                                                    </button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    {{-- End Defender --}}

                                                    {{-- Start Midfielder --}}
                                                    <div class="tab-pane" id="tab3">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover text-md-nowrap text-center player-table" data-position="2">

                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{{trans('player.photo_player')}}</th>
                                                                    <th>{{trans('player.name')}}</th>
                                                                    <th>{{trans('player.club_name')}}</th>
                                                                    <th>{{trans('player.age')}}</th>
                                                                    <th>{{trans('player.nationality')}}</th>
                                                                    <th>{{trans('player.process')}}</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($players as $player)
                                                                    @if($player->position==2)
                                                                        <tr>
                                                                            <td>{{$player->shirt_number}}</td>
                                                                            <td>
                                                                                <img width="50px" height="50px" alt="image" src="{{ asset('uploads/players/'. $player->photo) }}" />
                                                                            </td>
                                                                            @if(App::getLocale() == 'ar')
                                                                                <td>{{$player->name_ar}}</td>
                                                                                <td>
                                                                                    <a href="{{ route('club.show',  $player->club->id) }}"> {{$player->club->name_ar}}</a>
                                                                                </td>
                                                                            @else
                                                                                <td>{{$player->name_en}}</td>
                                                                                <td>
                                                                                    <a href="{{ route('club.show',  $player->club->id) }}"> {{$player->club->name_en}}</a>
                                                                                </td>
                                                                            @endif
                                                                            <td>  {{ now()->diffInYears($player->age) }}  </td>
                                                                            <td>{{$player->nationality}}</td>
                                                                            <td>
                                                                                <form action="{{ route('player.destroy',  $player->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')

                                                                                    <a href="{{ route('player.edit',  $player->id) }}"
                                                                                       class="btn btn-success btn-sm">
                                                                                        {{trans('player.edit_player')}}
                                                                                    </a>

                                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                                        {{trans('player.delete_player')}}
                                                                                    </button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    {{-- End Midfielder --}}

                                                    {{-- Start Striker --}}
                                                    <div class="tab-pane" id="tab4">
                                                        <div class="table-responsive">

                                                            <table class="table table-hover text-md-nowrap text-center player-table" data-position="3">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{{trans('player.photo_player')}}</th>
                                                                    <th>{{trans('player.name')}}</th>
                                                                    <th>{{trans('player.club_name')}}</th>
                                                                    <th>{{trans('player.age')}}</th>
                                                                    <th>{{trans('player.nationality')}}</th>
                                                                    <th>{{trans('player.process')}}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($players as $player)
                                                                    @if($player->position==3)
                                                                        <tr>
                                                                            <td>{{$player->shirt_number}}</td>
                                                                            <td>
                                                                                <img width="50px" height="50px" alt="image" src="{{ asset('uploads/players/'. $player->photo) }}" />
                                                                            </td>
                                                                            @if(App::getLocale() == 'ar')
                                                                                <td>{{$player->name_ar}}</td>
                                                                                <td>
                                                                                    <a href="{{ route('club.show',  $player->club->id) }}"> {{$player->club->name_ar}}</a>
                                                                                </td>
                                                                            @else
                                                                                <td>{{$player->name_en}}</td>
                                                                                <td>
                                                                                    <a href="{{ route('club.show',  $player->club->id) }}"> {{$player->club->name_en}}</a>
                                                                                </td>
                                                                            @endif
                                                                            <td>  {{ now()->diffInYears($player->age) }}  </td>
                                                                            <td>{{$player->nationality}}</td>
                                                                            <td>
                                                                                <form action="{{ route('player.destroy',  $player->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')

                                                                                    <a href="{{ route('player.edit',  $player->id) }}"
                                                                                       class="btn btn-success btn-sm">
                                                                                        {{trans('player.edit_player')}}
                                                                                    </a>

                                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                                        {{trans('player.delete_player')}}
                                                                                    </button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <br>

                                                    </div>
                                                    {{-- End Striker --}}


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
        </div>
    </div> <!-- Closing tag for the outermost div -->


    {{$players->links('pagination::bootstrap-4') }}
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#searchInput').on('input', function () {
                var searchValue = $(this).val().toLowerCase();

                $('.player-table tbody tr').each(function () {
                    var playerName = $(this).find('td:eq(2)').text().toLowerCase();
                    var clubName = $(this).find('td:eq(3) a').text().toLowerCase();

                    if (playerName.includes(searchValue) || clubName.includes(searchValue)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>


@endsection
