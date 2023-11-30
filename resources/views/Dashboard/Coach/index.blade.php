@extends('Dashboard.layouts.master')

@section('title')
    {{trans('coach.coaches')}}
@stop


    @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('coach.coaches')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{trans('coach.veiw_all_coach')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
				<!-- breadcrumb -->
 @section('content')
    @include('Dashboard.coach.messages_alert')

    <!-- row -->

                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card"  >
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                                        {{trans('coach.add_coach')}}
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap" id="example1">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0">{{trans('coach.image')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('coach.name')}}</th>
{{--                                            <th class="wd-15p border-bottom-0">{{trans('coach.date')}}</th>--}}
                                            <th class="wd-15p border-bottom-0">{{trans('coach.club')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('coach.created_at')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('coach.process')}}</th>


                                         </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($coaches as $coach)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img width="50px" height="50px" alt="image"
                                                     src="{{ asset('uploads/coach_logo/' . $coach->photo) }}"
                                                />
                                            </td>
                                            @if(App::getLocale() == 'ar')
                                            <td>{{$coach->name_ar}}</td>
                                                @else
                                                    <td>{{$coach->name_en}}</td>
                                                @endif
{{--                                            <td>{{ $coach->age }}</td>--}}
                                            @if(App::getLocale() == 'ar')
                                            <td> <a href="{{route('club.show',$coach->id)}}">{{ $coach->club->name_ar }}</a></td>
                                                @else
                                                    <td> <a href="{{route('club.show',$coach->id)}}">{{ $coach->club->name_en }}</a></td>
                                                @endif

                                            <td>{{ $coach->created_at->diffForHumans() }}</td>
                                            <td>
                                                <form action="{{ route('coach.destroy',  $coach->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="{{ route('coach.edit',  $coach->id) }}"
                                                       class="btn btn-success btn-sm">
                                                        {{trans('coach.edit')}}
                                                    </a>

                                                    <button type="submit" class="btn btn-danger btn-sm"> {{trans('coach.delete')}}</button>
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
                <!-- row closed -->
                <!-- Modal  add-->

                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{trans('coach.add_coach')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('coach.store') }}" method="post" autocomplete="off" enctype="multipart/form-data" >
                                @csrf
                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('coach.name_ar')}}</label>
                                    <input type="text" name="name_ar" class="form-control">
                                </div>

                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('coach.name_en')}}</label>
                                    <input type="text" name="name_en" class="form-control">
                                </div>

                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('coach.email')}}</label>
                                    <input type="email" name="email" class="form-control">
                                </div>

                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('coach.password')}}</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('coach.image_upload')}}</label>
                                    <input type="file" name="photo" class="form-control" >
                                </div>

                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('coach.date')}}</label>
                                    <input type="text" name="age" class="form-control">
                                </div>

                                <div class="modal-body">
                                    <label for="exampleInputPassword1">{{trans('coach.date')}}</label>
                                    <select id="club" name="club_id" class="form-control" required>
                                        <option value="">{{trans('index.clubs')}}</option>
                                        @foreach($clubs as $club)
                                            @if (App::getLocale() == 'ar')
                                                <option value="{{$club->id}}">{{$club->name_ar}}</option>
                                            @else
                                                <option value="{{$club->id}}">{{$club->name_en}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                                <div class="modal-body">
                                    <label for="nationality">{{trans('coach.nationality')}}</label>
                                    <input id="nationality" name="nationality" list="nationalitiesList" class="form-control" required>
                                    <datalist id="nationalitiesList">
                                        <option value="" label="{{trans('nation.player_nation')}}"></option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country['name']['common'] }}">
                                                {{ trans('nation.country_name.' . strtolower($country['cca2'])) }}
                                                <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} Flag">
                                            </option>
                                        @endforeach
                                    </datalist>

                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('coach.close')}}</button>
                                    <button type="submit" class="btn btn-primary">{{trans('coach.add_coach')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



@endsection