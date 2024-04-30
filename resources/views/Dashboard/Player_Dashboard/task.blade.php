@extends('Dashboard.layouts.master')
@section('css')
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('index.tasks')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{trans('index.veiw_all')}}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="row row-sm">

        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{trans('index.taskD')}}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('index.player')}}</th>
                                <th>{{trans('index.text')}}</th>
                                <th>{{trans('index.pro')}}</th>
                                <th>{{trans('index.Num')}}</th>
                                <th>{{trans('index.Achieved')}}</th>
                                <th>{{trans('index.status')}}</th>
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
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>


@endsection
@section('js')

@endsection
