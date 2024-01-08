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
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a type="button" class="btn btn-primary" href="{{ route('player_stats.create') }}">
                            {{trans('player.add_match_stats')}}
                        </a>

                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('player.photo_player')}}</th>
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


                            </tr>
                            </thead>
                            <tbody>


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

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



