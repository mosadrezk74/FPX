<?php

namespace App\Http\Controllers\Dashboard;

use App\Charts\ExpensesChart;
use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\FollowedPlayer;
use App\Models\History;
use App\Models\Player;
use App\Models\Standing;
use App\MyEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use function Ramsey\Uuid\v1;

class Coach_Dashboard extends Controller
{

    public function index()
    {
        $coach = auth()->guard('coach')->user();
        $clubDS=Club::all();
        $user = Auth::user();
        $club_id = $user->club_id;
        $clubs = Standing::where('club_id', $club_id)->get();
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

        $topLegScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')

            ->orderByDesc('stats.totalGoals')
            ->select('players.*', 'stats.totalGoals as totalGoals')
            ->take(6)->get();

        $topAssisterLeg =Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.goalAssists')
            ->select('players.*', 'stats.goalAssists as goalAssists')
            ->take(6)->get();





        return view('Dashboard.Coach_Dashboard.dashboard', compact('coach'
            ,
            'players',
                    'count_p',
            'clubs', 'club_id', 'tables' , 'topAssister'
            ,'topGoalScorer'

        ,'topLegScorer'
        ,'topAssisterLeg'
        ,'clubDS'


        ));
    }




    public function stats()
    {

        $coach = auth()->guard('coach')->user();
        $clubs = Club::all();
        $random_clubs = Club::all()->random(5);

        if ($coach) {
            $club_id = $coach->club_id;
            $players = Player::where('club_id', $club_id)->with('club')->paginate(8);
        }

        return view('Dashboard.Coach_Dashboard.stats', compact('coach', 'players',
            'clubs', 'club_id', 'random_clubs'));
    }

    public function show($playerId)
    {

        $player = Player::with(['club', 'stat'])->findOrFail($playerId);
        $random_clubs = Club::all()->random(5);

        return view('Dashboard.Coach_Dashboard.show_player', compact('player','random_clubs'));


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
        $clubs=Standing::where('club_id', $club->id)->get();
        $club_history = History::where('club_id', $club->id)->get();
        $coach = auth()->guard('coach')->user();
        $clubId = $coach->club_id;
        $club_st = Club::where('id', $clubId)->find($clubId);
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
            ,'clubs'


            ));
    }



    public function epl_stats(Request $request)
    {
        $coach = auth()->guard('coach')->user();
        $clubId = $coach->club_id;

        $players = Player::where('club_id', '!=', $clubId)->get();
        $clubs=Club::all();

        return view('Dashboard.Coach_Dashboard.epl_stats', compact('players'
        ,'clubs'

        ));
    }








    public function compare($player_id){
        $player1 = Player::findOrFail($player_id);
        $players = Player::where('id', '<>', $player_id)->get();

        return view('Dashboard.Players.compare', compact('player1', 'players'));
    }

 ##################################################################################################################################
 ##################################################################################################################################

    public function chat_coach()
    {
        return view('Dashboard.Coach_Dashboard.chat');
    }
    ##################################################################################################################################
    ##################################################################################################################################

    public function ajaxRequest(Request $request){

        $player = Player::find($request->user_id);
        $response = auth()->user()->toggleFollow($player);

        return response()->json(['success'=>$response]);
    }



    #####################



}
