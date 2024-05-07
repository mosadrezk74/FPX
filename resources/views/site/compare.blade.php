@extends('site.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('site/css/compare.css')}}" />
@endsection
@section('contact')
    <div class="container1 container">
        <form action="{{ route('comparison') }}" method="POST" class="form">
            @csrf
            <label for="player1">Select Player 1:</label>
            <input list="player1List" id="player1" name="player1" placeholder="Type player name...">
            <datalist id="player1List">
                @foreach($players as $player)
                    <option value="{{ $player->name_ar }}">{{ $player->name_ar }}</option>
                @endforeach
            </datalist>

            <label for="player2">Select Player 2:</label>
            <input list="player2List" id="player2" name="player2" placeholder="Type player name...">
            <datalist id="player2List">
                @foreach($players as $player)
                    <option value="{{ $player->name_ar }}">{{ $player->name_ar }}</option>
                @endforeach
            </datalist>

            <button class="supmit" style="width: 300px" type="submit">
                <a style="color: #fff; text-decoration: none; font-size: 20px;">comparison</a>
            </button>
        </form>

        </form>

    </div>

@endsection
@section('js')
@endsection
