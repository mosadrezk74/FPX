<?php

namespace App\Http\Controllers\Dashboard;

use App\Charts\ExpensesChart;
use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\FollowedPlayer;
use App\Models\History;
use App\Models\Player;
use App\Models\Standing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;


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


        $followedPlayers = request()->cookie('followed_players');
        $followedPlayers = $followedPlayers ? unserialize($followedPlayers) : [];
        $players_followed = Player::whereIn('id', $followedPlayers)->get();


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
            ,'topGoalScorer'
            ,'players_followed'


        ), ['chart' => $chart->build()]);
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

    public function compare($player_id){
        $player1 = Player::findOrFail($player_id);
        $players = Player::where('id', '<>', $player_id)->get();

        return view('Dashboard.Players.compare', compact('player1', 'players'));
    }

    public function comparePlayers(Request $request, $player_id){
        $player1 = Player::findOrFail($player_id);
        $player2_id = $request->input('player2_id');

        if ($player2_id) {
            $player2 = Player::findOrFail($player2_id);
        } else {
            $player2 = null;
        }

        return view('Dashboard.Players.compare', compact('player1', 'player2'));
    }






    public function ajaxRequest(Request $request){

        $player = Player::find($request->user_id);
        $response = auth()->user()->toggleFollow($player);

        return response()->json(['success'=>$response]);
    }



}
