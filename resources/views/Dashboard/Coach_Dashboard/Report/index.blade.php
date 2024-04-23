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
                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Player Name</th>
                                    <th>Text</th>
                                    <th>Priority</th>
                                    <th>Num</th>
                                    <th>Achieved</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <img width="30px" height="30px" alt="image"
                                                 src="{{ asset('uploads/players/' . $task->player->photo) }}"
                                            />
                                            <a href="{{route('player.show', $task->player->id)}}">
                                                {{$task->player->name_ar}}
                                            </a>
                                        </td>
                                        <td>{{$task->descr}}</td>
                                        @if($task->priority==1)
                                            <td>منخفض</td>
                                        @elseif($task->priority==2)
                                            <td>متوسط</td>
                                        @elseif($task->priority==3)
                                            <td>عالي</td>
                                        @endif
                                        <td>{{$task->num}}</td>
                                        @if($task->category ==1)
                                            <td>{{$task->player->stat->Goals}}</td>
                                            <td>
                                                @php
                                                    $totw=intval($task->player->stat->Goals)
                                                @endphp
                                                @if($totw>=$task->num)
                                                    <span class="text-success">ACHIEVED</span>
                                                @elseif($totw<$task->num)
                                                    <span class="text-danger">NOT ACHIEVED</span>
                                                @endif
                                            </td>

                                        @elseif($task->category ==2)
                                            <td>{{intval($task->player->stat->Assists * $task->player->stat->MP )}}</td>
                                            <td>
                                                @php
                                                    $totw=intval($task->player->stat->Assists * $task->player->stat->MP)
                                                @endphp
                                                @if($totw>=$task->num)
                                                    <span class="text-success">ACHIEVED</span>
                                                @elseif($totw<$task->num)
                                                    <span class="text-danger">NOT ACHIEVED</span>
                                                @endif
                                            </td>

                                        @elseif($task->category ==3)
                                            <td>{{intval($task->player->stat->Tkl * $task->player->stat->MP )}}</td>
                                            <td>
                                                @php
                                                    $totw=intval($task->player->stat->Tkl * $task->player->stat->MP)
                                                @endphp
                                                @if($totw>=$task->num)
                                                    <span class="text-success">ACHIEVED</span>
                                                @elseif($totw<$task->num)
                                                    <span class="text-danger">NOT ACHIEVED</span>
                                                @endif
                                            </td>

                                        @elseif($task->category ==4)
                                            <td>{{intval($task->player->stat->TklDriPast * $task->player->stat->MP )}}</td>
                                            <td>
                                                @php
                                                    $totw=intval($task->player->stat->TklDriPast * $task->player->stat->MP)
                                                @endphp
                                                @if($totw>=$task->num)
                                                    <span class="text-success">ACHIEVED</span>
                                                @elseif($totw<$task->num)
                                                    <span class="text-danger">NOT ACHIEVED</span>
                                                @endif
                                            </td>

                                        @elseif($task->category ==5)
                                            <td>{{intval($task->player->stat->PasTotCmp * $task->player->stat->MP )}}</td>
                                            <td>
                                                @php
                                                    $totw=intval($task->player->stat->PasTotCmp * $task->player->stat->MP)
                                                @endphp
                                                @if($totw>=$task->num)
                                                    <span class="text-success">ACHIEVED</span>
                                                @elseif($totw<$task->num)
                                                    <span class="text-danger">NOT ACHIEVED</span>
                                                @endif
                                            </td>
                                        @elseif($task->category ==6)
                                            <td>{{intval($task->player->stat->G_SoT * $task->player->stat->MP )}}</td>
                                            <td>
                                                @php
                                                    $totw=intval($task->player->stat->G_SoT * $task->player->stat->MP)
                                                @endphp
                                                @if($totw>=$task->num)
                                                    <span class="text-success">ACHIEVED</span>
                                                @elseif($totw<$task->num)
                                                    <span class="text-danger">NOT ACHIEVED</span>
                                                @endif
                                            </td>
                                        @elseif($task->category ==7)
                                            <td>Others</td>
                                        @else
                                            <td>N/A</td>
                                        @endif


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





