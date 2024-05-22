@extends('Dashboard.layouts.master')

@section('title')
    {{trans('index.gen_info')}}
@stop




@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">

                <h4 class="content-title mb-0 my-auto">{{trans('index.compare')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/قارن
				</span>




            </div>
        </div>
    </div>
@endsection

@section('content')



    <div class="row" >
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body" >
                    <form action="{{route('back.comparison')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="player1">اللاعب الأول</label>
                            <input class="form-control"  id="player1" name="player1" placeholder="{{trans('site/index.lang')}}" list="player1List" >
                            <datalist id="player1List">
                                @foreach($players as $player)
                                    @if(App::getlocale() == 'ar')
                                        <option value="{{ $player->name_ar }}">{{ $player->name_ar }}</option>

                                    @else
                                        <option value="{{ $player->name_en }}">{{ $player->name_en }}</option>
                                    @endif
                                @endforeach
                            </datalist>

                        </div>
                        {{--####################################################################################################################--}}
                        <div class="form-group">
                            <label for="player2">اللاعب التاني</label>
                            <input class="form-control" id="player2" name="player2" placeholder="{{trans('site/index.lang')}}"  list="player2List">
                            <datalist id="player2List">
                                @foreach($players as $player)
                                    @if(App::getlocale() == 'ar')
                                        <option value="{{ $player->name_ar }}">{{ $player->name_ar }}</option>

                                    @else
                                        <option value="{{ $player->name_en }}">{{ $player->name_en }}</option>
                                    @endif
                                @endforeach
                            </datalist>

                        </div>


                        <button   type="submit" class="btn btn-lg btn-primary btn-block">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('js')


@endsection
