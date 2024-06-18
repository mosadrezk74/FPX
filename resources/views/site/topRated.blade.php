@extends('site.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('site/css/topRated.css')}}" />
@endsection
@section('title')
    {{trans('site/index.topRated')}}
@endsection
@section('contact')
        <div class="head container">
          <h1>{{trans('site/index.topRated')}}</h1>
        </div>

        <div class="container1 container table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>{{trans('site/index.image')}}</th>
                <th>{{trans('site/index.name')}}</th>
                <th>{{trans('site/index.club')}}</th>
                <th>{{trans('site/index.position')}}</th>
                <th>{{trans('site/index.age')}}</th>
                <th>{{trans('site/index.rating')}}</th>
              </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($players as $player)
                    <th>
                        <img src="{{$player->photo}}" style="width: 70px ; height: 70px "  />
                    </th>
                @if(App::getLocale() == 'en')
                        <td> <a href="" style="text-decoration: none;color: white" >{{$player->name_en}}</a>  </td>
                        <td>
                            <img src="{{$player->club->image}}" style="width: 30px ; height: 30px "  />
                            {{$player->club->name_en}}
                        </td>
                    @else
                        <td> <a href="" style="text-decoration: none;color: white" >{{$player->name_ar}}</a>  </td>
                        <td>
                            <img src="{{$player->club->image}}" style="width: 30px ; height: 30px "  />
                            {{$player->club->name_ar}}
                        </td>
                    @endif
                    @if($player->position == 0)
                        <td>{{trans('site/index.goalKeeper')}}</td>
                    @elseif($player->position == 1)
                        <td>{{trans('site/index.defender')}}</td>
                    @elseif($player->position == 2)
                        <td>{{trans('site/index.mid')}}</td>
                    @elseif($player->position == 3)
                        <td>{{trans('site/index.forward')}}</td>
                    @endif

                    <td>{{$player->stat->Age}}</td>
                    <td>{{intval($player->stat->PasMedCmp_per)}}</td>
            </tr>
            @endforeach


            </tbody>
          </table>
        </div>
@endsection
