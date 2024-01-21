<?php

namespace App\Http\Controllers;

use App\Charts\ExpensesChart;
use App\Models\Club;
use App\Models\fs;
use App\Models\Player;
use App\Models\Standing;
use App\Models\Statistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Coach_Dashboard extends Controller
{

    public function index(ExpensesChart $chart)
    {
        $coach = auth()->guard('coach')->user();
        $clubs = Club::all();
        $random = rand(1, 10);
        $user = Auth::user();
        $club_id = $user->club_id;
        $club = Player::with('club')->where('club_id', $club_id)->get();
        $count_p = $club->count();
        $players = Player::with('club')->where('club_id', $club_id)->get();
        $tables = Standing::all()->take(10);
//        $topScorer = Player::select('players.*', 'stats.totalGoals as totalGoals')
//            ->join('stats', 'players.id', '=', 'stats.player_id')
//            ->orderByDesc('stats.totalGoals')
//            ->first();
//
//        $playerName = $topScorer->name_ar ?? '';
//        $maxTotalGoals = $topScorer->totalGoals ?? 0;
        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.totalGoals')
            ->select('players.*', 'stats.totalGoals as totalGoals')
            ->first();


        return view('Dashboard.Coach_Dashboard.dashboard', compact('coach'
            ,
            'players',
            'random', 'count_p',
            'clubs', 'club_id', 'tables'
            ,'topGoalScorer'), ['chart' => $chart->build()]);
    }

}
