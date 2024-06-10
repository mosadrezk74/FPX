@extends('Dashboard.layouts.master')

@section('title')
    {{trans('index.compare')}}
@stop




@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">

                <h4 class="content-title mb-0 my-auto">{{trans('index.compare')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{trans('index.compare')}}
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
                    <form action="{{ route('comparePlayers') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="player2">{{trans('index.choose')}}</label>
                            <input type="text" name="player2" id="player2"  list="player2List" class="form-control" placeholder="{{trans('site/index.lang')}}"  required>
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
                        <button type="submit" class="btn btn-primary">{{trans('index.compare')}}</button>
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
