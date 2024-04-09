@extends('Dashboard.layouts.master')
@section('title')
    analysiss
@stop



@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('analysis.analysiss')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('analysis.show')}}</span>

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
                    <a href="{{ route('analysis.create') }}" class="btn btn-primary" role="button" aria-pressed="true">{{trans('analysis.create_analysis')}}</a>
                </div>

                <div class="card-body">
                    <div class="col-lg-12 col-md-12">
                        <div class="card" id="basic-alert">
                            <div class="card-body">
                                <div class="text-wrap">
                                    <div class="example">

                                                        <div class="table-responsive">
                                                            <table class="table table-hover text-md-nowrap text-center analysis-table" data-position="0">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{{trans('analysis.photo_analysis')}}</th>
                                                                    <th>{{trans('analysis.name')}}</th>
                                                                    <th>{{trans('analysis.club_name')}}</th>

                                                                    <th>{{trans('analysis.status')}}</th>
                                                                    <th>{{trans('analysis.process')}}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($analyses as $analysis)

                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>

                                                                            <td><img src="{{asset('uploads/analysis/'.$analysis->photo)}}" width="50px" height="50px" alt=""></td>

                                                                            <td>
                                                                                {{$analysis->name_ar}}
                                                                            </td>
                                                                            <td>{{$analysis->email}}</td>

                                                                            <td>{{$analysis->status}}</td>
                                                                            <td>
                                                                                <form action="{{ route('analysis.destroy',  $analysis->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')

                                                                                    <a href="{{ route('analysis.edit',  $analysis->id) }}"
                                                                                       class="btn btn-success btn-sm">
                                                                                        {{trans('analysis.edit_analysis')}}
                                                                                    </a>

                                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                                        {{trans('analysis.delete_analysis')}}
                                                                                    </button>
                                                                                </form>
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

                $('.analysis-table tbody tr').each(function () {
                    var analysisName = $(this).find('td:eq(2)').text().toLowerCase();
                    var clubName = $(this).find('td:eq(3) a').text().toLowerCase();

                    if (analysisName.includes(searchValue) || clubName.includes(searchValue)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>



