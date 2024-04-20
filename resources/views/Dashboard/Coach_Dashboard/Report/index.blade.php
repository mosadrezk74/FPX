@extends('Dashboard.layouts.master')
@section('title')
    Reports
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('index.report')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('index.report')}}</span>
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
        <div class="container">

            <div class="col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('report.create') }}" class="btn btn-primary" role="button" aria-pressed="true">{{trans('index.tasks')}}</a>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th class="text-center">
                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Player Name</th>
                                    <th>Text</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($tasks as $task)

                                <tr>
                                    <td class="text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <th>

                                        <img width="30px" height="30px" alt="image"
                                             src="{{ asset('uploads/players/' . $task->player->photo) }}"
                                        />
                                    <a type="button" class="text-primary"   data-toggle="modal" data-target="#add">
                                        {{$task->player->name_ar}}
                                    </a>
                                    </th>
                                    <td>{{$task->descr}}</td>
                                    <td>
                                        @if($task->priority == 1)
                                            <span class="text-secondary">in progress</span>
                                        @elseif($task->priority == 2)
                                            <span class="text-danger">Fail</span>
                                        @elseif($task->priority == 3)
                                            <span class="text-success">Done</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" data-original-title="Delete"><i class="fas fa-trash"></i></a>
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

    <!-- Modal  add-->

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('index.task')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                     <div class="modal-body">
                        <label for="exampleInputPassword1">{{trans('coach.name_ar')}}</label>
                        <input type="text" value="{{$task->num}}" class="form-control" disabled>
                    </div>

             </div>
        </div>
    </div>




@endsection





