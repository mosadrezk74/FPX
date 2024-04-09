<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Message;
use App\Models\Player;
use App\Models\Standing;
use App\MyEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Player_Dashboard extends Controller
{
    public function index()
    {
        $player = auth()->guard('player')->user();
        $clubDS=Club::all();
        $user = Auth::user();
        $club_id = $user->club_id;
        $player_id = $user->player_id;
        $clubs = Standing::where('club_id', $club_id)->get();
        $club = Player::with('club')->where('club_id', $club_id)->get();
        $count_p = $club->count();
        $players = Player::with('club')->where('club_id', $club_id)->get();
        $tables = Standing::all()->take(10);

        $totalGoals = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.goalAssists')
            ->select('players.*', 'stats.totalGoals as totalGoals')
            ->first();


        $random_clubs = Club::all()->random(5);
        $event_player= event(new MyEvent('hello world' , auth()->user()->name_ar));


        return view('Dashboard.Player_Dashboard.dashboard', compact(
            'player',
            'players',
            'count_p',
            'club_id',
            'clubs', 'player_id', 'tables'
            ,'totalGoals'
            ,'clubDS'
            ,'random_clubs'
            ,'event_player'
        ));
    }

    public function stats()
    {
        $player = auth()->guard('player')->user();
        $club_id = $player->club_id;
        $player_id = $player->id;
        $stats = Player::with('stat')->where('club_id', $club_id)->get();
        $random_clubs = Club::all()->random(5);
        $random_dates = [];

        for ($i = 0; $i < 5; $i++) {
            $random_days = mt_rand(0, 30);
            $random_date = Carbon::now()->subDays($random_days);
            $formatted_date = $random_date->format('d-m');
            $random_dates[] = $formatted_date;
        }
        return view('Dashboard.Player_Dashboard.stats',
            compact('player', 'stats', 'club_id', 'player_id' ,'random_clubs' , 'random_dates' ));
    }


    public function chat_coach()
    {
        return view('Dashboard.Player_Dashboard.chat');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'sender' => 'required|in:player,coach',
            'message' => 'required|string',
        ]);

        $message = new Message();
        $message->sender = $request->sender;
        $message->message = $request->message;
        $message->save();

        return response()->json(['success' => true]);
    }

}
