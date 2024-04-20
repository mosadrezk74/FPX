@extends('Dashboard.layouts.master')

<script src="{{ asset('chat/js/jquery_v3.4.1/dist/jquery.min.js') }}"></script>
<script src="{{ asset('chat/js/home.js') }}"></script>
<link rel="stylesheet" href="{{ asset('chat/css/home.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<br>
<br>

    <div class="container">
        <div class="row justify-content-center">

            <!-- LIST OF ONLINE USERS -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"> تواصل مع مدربك  </div>

                    <div class="card-body">
                        <div class="list-group">
                            @foreach($players as $player)
                                <a href="javascript:;" onclick="openChatBox({{$player}},{{Auth::user()->id}});" class="list-group-item list-group-action-item">
                                    <div class="d-flex" style="border:0px solid red">
                                        <img width="30px" height="30px" alt="image"
                                             src="{{ asset('uploads/coach_logo/'. $player->photo) }}" />
                                        <span id="{{ $player->name_ar }}"> {{ $player->name_ar }} </span>
                                    </div>
                                </a>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8" id="default_card">
                <div class="card">
                    <div class="card-header"> Choose a conversation</div>
                    <div class="card-body">
                        <h1 class="text-primary"> Please choose a user to message.</h1>
                    </div>
                </div>
            </div>

            <!-- CHAT BOX OF THE SELECTED USER -->
            <div class="col-md-8" id="active_card" style="display:none;">
                <div class="card">
                    <div class="card-header" id="chatWithName">(Name of Selected User)</div>

                    <div class="card-body messageThread" id="">
                        @foreach($messages as $message)
                        <h1 id="loadingMessages">{{$message->message}}</h1>
                        @endforeach


                    </div>

                    <div class="card-body p-0 m-0" style="border:0px solid black">


                    </div>

                </div>
            </div>


        </div>
    </div>


@endsection
@section('js')




@endsection
