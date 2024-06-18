@extends('site.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('site/css/discover.css')}}" />
@endsection
@section('title')
    {{trans('site/index.discover')}}
@endsection
@section('contact')
        <div class="head container">
          <h1>{{trans('site/index.discover_players')}}</h1>
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
                  @if(App::getlocale()=='ar')
                <td>
                    <a href="#" style="text-decoration: none;color: white" >{{$player->name_ar}}</a></td>
                      @else
                          <td>
                              <a href="#" style="text-decoration: none;color: white" >{{$player->name_en}}</a></td>
                      @endif

                <td>
                    <img src="{{$player->club->image}}" style="width: 30px ; height: 30px "  />
                    @if(App::getlocale()=='ar')
                    {{$player->club->name_ar}}
                    @else
                        {{$player->club->name_en}}
                    @endif
                </td>
                  @if($player->position == 0)
                          <td>{{trans('index.Goalkeeper')}}</td>
                      @elseif($player->position == 1)
                          <td>{{trans('index.Defender')}}</td>
                      @elseif($player->position == 2)
                          <td>{{trans('index.Midfielder')}}</td>
                      @elseif($player->position == 3)
                          <td>{{trans('index.Forward')}}</td>
                      @endif

                <td>{{now()->diffInYears($player->age)}}</td>
                <td>{{rand(85,90)}}</td>
              </tr>
              @endforeach


            </tbody>
          </table>
        </div>
@endsection
