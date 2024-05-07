@extends('site.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('site/css/discover.css')}}" />
@endsection
@section('contact')
        <div class="head container">
          <h1>the discovered players</h1>
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
                <td> <a href="" style="text-decoration: none;color: white" >{{$player->name_en}}</a>  </td>
                <td>
                    <img src="{{$player->club->image}}" style="width: 30px ; height: 30px "  />
                    {{$player->club->name_en}}
                </td>
                  @if($player->position == 0)
                          <td>GoalKeeper</td>
                      @elseif($player->position == 1)
                          <td>Defender</td>
                      @elseif($player->position == 2)
                          <td>Mid</td>
                      @elseif($player->position == 3)
                          <td>Forward</td>
                      @endif

                <td>{{$player->stat->Age}}</td>
                <td>96</td>
              </tr>
              @endforeach


            </tbody>
          </table>
        </div>
@endsection
