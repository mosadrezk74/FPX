@extends('Dashboard.layouts.master')



<script src="{{ asset('chat/js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('chat/js/jquery_v3.4.1/dist/jquery.min.js') }}"></script>
<script src="{{ asset('chat/js/home.js') }}"></script>
<link rel="stylesheet" href="{{ asset('chat/css/home.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<br>


    <div class="container">
        <div class="row justify-content-center">

             <div class="col-md-4">
                <div class="card">
                    <div class="card-header"> {{trans('dash.online_players')}} </div>

                    <div class="card-body">
                        <div class="list-group">
                            @foreach($players as $player)
                                <a href="javascript:;" onclick="openChatBox({{$player}},{{Auth::user()->id}});"
                                   class="list-group-item list-group-action-item">

                                    <div class="d-flex" style="border:0px solid red">

                                        <img width="30px" height="30px" alt="image"
                                             src="{{$player->photo}}"  />

                                        <span id="{{ $player->name_en }}"> {{ $player->name_ar }} </span>
                                    </div>
                                </a>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8" id="default_card">
                <div class="card">
                    <div class="card-header"> {{trans('dash.choose_a_conversation')}}</div>
                    <div class="card-body">
                        <h1 class="text-primary">  {{trans('dash.please_choose_a_user_to_message')}}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-8" id="active_card" style="display:none;">
                <div class="card">
                    <div class="card-header" id="chatWithName"> {{trans('dash.name_of_selected_user')}}</div>

                    <div class="card-body messageThread" id="messageThread">
                        <h1 id="loadingMessages"> {{trans('dash.loading_messages')}}</h1>


                    </div>

                    <div class="card-body p-0 m-0" style="border:0px solid black">

                        <form method="POST" onsubmit="submitMessage();" autocomplete="off">
                            @csrf
                            <div style="display:block;">
                                <input type="hidden" id="convo_id" name="convo_id" required>
                                <input class="form-control m-0" name="message" id="messsageInput" rows="3" required>
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block" id="sendMsgBtn">{{trans('dash.Send')}}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>



@endsection
@section('js')




@endsection
