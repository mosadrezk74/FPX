@extends('Dashboard.layouts.master')

@section('title')
    {{trans('index.gen_info')}}
@stop




@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">

                    <h4 class="content-title mb-0 my-auto">{{trans('index.gen_info')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
				</span>




            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('Dashboard.Clubs.messages_alert')


    <div class="row row-sm">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content border-left border-bottom border-right border-top p-4">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" id="search-input" class="form-control" placeholder="Search with player's name...">
                            </div>
                            <div class="table-responsive">
                                <table class="table text-md-nowrap text-center" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center" >{{trans('player.photo_player')}}</th>
                                        <th  class="text-center">{{trans('player.name')}}</th>
                                        <th class="text-center" >{{trans('player.appearances')}}</th>
                                        <th class="text-center" >{{trans('index.totalgoals')}}</th>
                                        <th class="text-center" >{{trans('index.totalassists')}}</th>
                                        <th class="text-center" >{{trans('index.xg')}}</th>
                                        <th class="text-center" >{{trans('index.xa')}}</th>
                                        <th class="text-center" >{{trans('index.process')}}</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($players as $player)
                                        <tr>
                                            <th >{{$loop->iteration}}</th>
                                            <td style="width:50px" >
                                                <img  alt="image" src="{{ asset('uploads/players/'. $player->photo) }}" />
                                            </td>
                                            <td>
                                                <a   style="font-size: 15px ;" href="{{route('stats.show',$player->id)}}">
                                                    @if(App::getLocale() == 'ar')
                                                        {{$player->name_ar}}
                                                    @else
                                                        {{$player->name_en}}
                                                    @endif
                                                </a>
                                            </td>
                                            <td>{{$player->stat->Appearances}}</td>
                                            <td>{{$player->stat->totalGoals}}</td>
                                            <td>{{$player->stat->goalAssists}}</td>
                                            <td>{{rand(100,50)/100 }}</td>
                                            <td>{{rand(100,50)/100 }}</td>

                                            <td>
                                                <div class="NNN">
                                                    <a href="{{route('stats.show',$player->id)}}"  class="btn btn-sm btn-success">{{trans('index.view')}}</a>
                                                    <a href="{{route('stats.print',$player->id)}}" class="btn btn-primary btn-sm" target="_blank" title="طباعه احصائيات لاعب">{{trans('index.print')}}</a>

                                                </div>
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
        </div>
    </div>

    </div>
    </div>
@endsection
@section('js')
     <script>
        $(document).ready(function() {
            $('#search-input').on('input', function() {
                var query = $(this).val().toLowerCase();

                $('table tbody tr').each(function() {
                    var name = $(this).find('td:nth-child(3)').text().toLowerCase();
                    var appearances = $(this).find('td:nth-child(4)').text().toLowerCase();
                    var totalGoals = $(this).find('td:nth-child(5)').text().toLowerCase();
                    var totalAssists = $(this).find('td:nth-child(6)').text().toLowerCase();

                    if (name.includes(query) || appearances.includes(query) || totalGoals.includes(query) || totalAssists.includes(query)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>

@endsection
