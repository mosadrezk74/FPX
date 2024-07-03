@extends('site.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('site/css/compare.css') }}" />
@endsection
@section('title')
    {{ trans('site/index.compare') }}
@endsection
@section('contact')
    @auth

        <div class="container1 container">
            <form action="{{ route('comparison') }}" method="POST" class="form" autocomplete="none">
                @csrf
                <label for="player1">{{ trans('site/index.player1') }}</label>
                <input list="player1List" id="player1" name="player1" placeholder="{{ trans('site/index.lang') }}"
                    autocomplete="none">
                <datalist id="player1List">
                    @foreach ($players as $player)
                        @if (App::getlocale() == 'ar')
                            <option value="{{ $player->name_ar }}">{{ $player->name_ar }}</option>
                        @else
                            <option value="{{ $player->name_en }}">{{ $player->name_en }}</option>
                        @endif
                    @endforeach
                </datalist>

                <label for="player2">{{ trans('site/index.player2') }}</label>
                <input list="player2List" id="player2" name="player2" placeholder="{{ trans('site/index.lang') }}"
                    autocomplete="none">
                <datalist id="player2List">
                    @foreach ($players as $player)
                        @if (App::getlocale() == 'ar')
                            <option value="{{ $player->name_ar }}">{{ $player->name_ar }}</option>
                        @else
                            <option value="{{ $player->name_en }}">{{ $player->name_en }}</option>
                        @endif
                    @endforeach
                </datalist>

                <button class="supmit" style="width: 300px" type="submit">
                    <a style="color: #fff; text-decoration: none; font-size: 20px;">comparison</a>
                </button>
            </form>
        @else
            <div class="container1 container">
                <center>
                    <br>
                    <br>
                    <h1 style="color: #fff">
                        Sign in first to access compare form
                    </h1><br>
                    <button class="supmit" style="width: 300px" type="submit">
                        <a href="{{ route('login') }}" style="color: #fff; text-decoration: none; font-size: 20px;">
                            {{ trans('site/index.sign') }}
                        </a>
                    </button>
                </center>
            </div>


        @endauth

    </div>
@endsection
@section('js')
@endsection
