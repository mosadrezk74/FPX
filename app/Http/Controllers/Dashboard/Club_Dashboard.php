<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\History;
use App\Models\Player;
use App\Models\Standing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Club_Dashboard extends Controller
{
    public function index()
    {
        $club = auth()->guard('club')->user();
        $club_id = $club->id;
        $clubDS = Club::all();
        $clubs = Standing::where('club_id', $club_id)->get();

        $clubPlayers = Player::with('club')->where('club_id', $club_id)->get();
        $count_p = $clubPlayers->count();

        $players = Player::with('club')
            ->where('club_id', $club_id)
            ->inRandomOrder()
            ->take(7)
            ->get();

        $tables = Standing::take(10)->get();

        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.Goals')
            ->select('players.*', 'stats.Goals as Goals')
            ->first();

        $topAssister = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc(DB::raw('stats.Assists * stats.MP'))
            ->select('players.*', 'stats.Assists as Assists', 'stats.MP as MP')
            ->first();

        $topLegScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.Goals')
            ->select('players.*', 'stats.Goals as Goals')
            ->take(6)
            ->get();

        $topAssisterLeg = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc(DB::raw('stats.Assists * stats.MP'))
            ->select('players.*', 'stats.Assists as Assists', 'stats.MP as MP')
            ->take(6)
            ->get();

        return view('Dashboard.Club_Dashboard.dashboard', compact(
            'club',
            'players',
            'count_p',
            'clubs',
            'club_id',
            'tables',
            'topAssister',
            'topGoalScorer',
            'topLegScorer',
            'topAssisterLeg',
            'clubDS'
        ));
    }

    public function club_info()
    {
        $club = auth()->guard('club')->user();
        $club_id = $club->id;
        $club_ST = Player::with('club')->where('club_id', $club_id)->get();
        $count_p = $club_ST->count();
        $tables = Standing::where('club_id', $club_id)->get();
        $club_history = History::where('club_id', $club_id)->get();
        $clubId = $club->id;
        $club_st = Club::where('id', $clubId)->find($clubId);
        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.Goals')
            ->inRandomOrder()
            ->select('players.*', 'stats.Goals as Goals')
            ->first();
        $topGoalScorers = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.Goals')
            ->limit(5)
            ->select('players.*', 'stats.Goals as Goals')
            ->get();
        $topAssisters = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc(DB::raw('stats.Assists * stats.MP'))
            ->select('players.*', 'stats.Assists as Assists', 'stats.MP as MP')
            ->limit(5)
            ->get();
        $topAssister = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc(DB::raw('stats.Assists * stats.MP'))
            ->select('players.*', 'stats.Assists as Assists', 'stats.MP as MP')
            ->inRandomOrder()
            ->first();
        $topPlayer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.MP')
            ->inRandomOrder()
            ->select('players.*', 'stats.MP as MP')
            ->first();
        $upcomingMatches = DB::table('fixtures')
            ->where('date', '>=', now())
            ->orderBy('date', 'asc')
            ->get();

        return view('Dashboard.Club_Dashboard.your_club_info', compact(

            'club',
            'tables',
            'count_p',
            'upcomingMatches',
            'topGoalScorer',
            'topAssister',
            'topPlayer',
            'club_history',
            'topGoalScorers',
            'topAssisters',
            'club_st'
        ));
    }

    public function stats()
    {
        $club = auth()->guard('club')->user();
        $club_id = $club->id;
        $players = Player::where('club_id', $club_id)->with('club')->paginate(35);
        $clubs = Club::all();
        $random_clubs = Club::all()->random(5);

        return view('Dashboard.Club_Dashboard.stats', compact('club', 'players', 'clubs', 'club_id', 'random_clubs'));
    }








}
