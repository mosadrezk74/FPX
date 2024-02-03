<?php

namespace App\Http\Controllers\Dashboard;

use App\Charts\ExpensesChart;
use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\History;
use App\Models\Player;
use App\Models\Standing;
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
        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.totalGoals')
            ->select('players.*', 'stats.totalGoals as totalGoals')
            ->first();

        $topAssister = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.goalAssists')
            ->select('players.*', 'stats.goalAssists as goalAssists')
            ->first();

//        $upcomingMatches = DB::table('fixtures')
//            ->where('date', '>=', now())
//            ->where(function ($query) use ($club_id) {
//                $query->where('club_id', $club_id)
//                    ->orWhere('club_id_two', $club_id);
//            })
//            ->orderBy('date', 'asc')
//            ->get();


        return view('Dashboard.Coach_Dashboard.dashboard', compact('coach'
            ,
            'players',
            'random', 'count_p',
            'clubs', 'club_id', 'tables' , 'topAssister'
            ,'topGoalScorer'), ['chart' => $chart->build()]);
    }




    public function stats()
    {

        $coach = auth()->guard('coach')->user();
        $clubs = Club::all();
        if ($coach) {
            $club_id = $coach->club_id;
            $players = Player::where('club_id', $club_id)->with('club')->paginate(8);
        }

        return view('Dashboard.Coach_Dashboard.stats', compact('coach', 'players', 'clubs', 'club_id'));
    }


    public function show($playerId)
    {
        $player = Player::with(['club', 'stat'])->findOrFail($playerId);
//        $club = Club::where('club_id', $playerId)->get();

        return view('Dashboard.Coach_Dashboard.show_player', compact('player'));


    }

    public function print(string $id)
    {
        $player = Player::findorfail($id);

         return view('Dashboard.Coach_Dashboard.print',  compact( 'player'));
    }

    public function club_info(){
        $coach = auth()->guard('coach')->user();
        $club = $coach->club;
        $tables = Standing::where('club_id', $club->id)->get();
        $club_history = History::where('club_id', $club->id)->get();
        $coach = auth()->guard('coach')->user();
        $clubId = $coach->club_id;
        $club_st = Club::where('id', $clubId)->find($clubId);
//        $club_history = History::where('id', $clubId)->find($clubId);
        $club = Player::with('club')->where('club_id', $clubId)->get();
        $count_p = $club->count();


        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $clubId)
            ->orderByDesc('stats.totalGoals')
            ->inRandomOrder()
            ->select('players.*', 'stats.totalGoals as totalGoals')
            ->first();

        $topGoalScorers = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $clubId)
            ->orderByDesc('stats.totalGoals')
            ->limit(5)
            ->select('players.*', 'stats.totalGoals as totalGoals')
            ->get();

        $topAssisters = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $clubId)
            ->orderByDesc('stats.goalAssists')
            ->limit(5)
            ->select('players.*', 'stats.goalAssists as goalAssists')
            ->get();


        $topAssister = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $clubId)
            ->orderByDesc('stats.goalAssists')
            ->inRandomOrder()
            ->select('players.*', 'stats.goalAssists as goalAssists')
            ->first();

        $topPlayer= Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $clubId)
            ->orderByDesc('stats.Appearances')
            ->inRandomOrder()
            ->select('players.*', 'stats.Appearances as Appearances')
            ->first();


                $upcomingMatches = DB::table('fixtures')
            ->where('date', '>=', now())
            ->orderBy('date', 'asc')
            ->get();


        return view('Dashboard.Coach_Dashboard.your_club_info'
        ,compact('coach',  'club',  'tables' , 'club_st','count_p'
            ,'upcomingMatches'
            ,'topGoalScorer', 'topAssister', 'topPlayer' , 'club_history'
            ,'topGoalScorers'
            ,'topAssisters'


            ));
    }





}
