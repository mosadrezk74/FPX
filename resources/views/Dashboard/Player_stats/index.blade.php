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
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">SIMPLE TABLE</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">اسم اللاعب</th>
                                <th class="wd-15p border-bottom-0">المركز</th>
                                <th class="wd-20p border-bottom-0">عدد المباريات</th>
                                <th class="wd-15p border-bottom-0">أهداف</th>
                                <th class="wd-15p border-bottom-0">XG</th>
                                <th class="wd-10p border-bottom-0">أسيستات</th>
                                <th class="wd-10p border-bottom-0">XA</th>
                                <th class="wd-25p border-bottom-0">عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Bella</td>
                                <td>Chloe</td>
                                <td>System Developer</td>
                                <td>2018/03/12</td>
                                <td>$654,765</td>
                                <td>b.Chloe@datatables.net</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->


    </div>
    <!-- /row -->
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



