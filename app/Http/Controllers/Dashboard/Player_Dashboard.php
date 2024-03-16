<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Player;
use App\Models\Standing;
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



        return view('Dashboard.Player_Dashboard.dashboard', compact(
            'player',
            'players',
            'count_p',
            'club_id',
            'clubs', 'player_id', 'tables'
            ,'totalGoals'
            ,'clubDS'
            ,'random_clubs'

        ));
    }

}
