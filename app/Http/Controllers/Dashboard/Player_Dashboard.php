<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\History;
use App\Models\Message;
use App\Models\Player;
use App\Models\Standing;
use App\Models\Task;
use App\MyEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $clubDS=Club::all();


        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.Goals')
            ->select('players.*', 'stats.Goals as Goals')
            ->first();

        $topAssister = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.Assists')
            ->select('players.*', 'stats.Assists as Assists')
            ->first();

        $authPlayer = Auth::user();
        $currentPlayerRank = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->where('players.id', $authPlayer->id)
            ->select('players.*', 'stats.SoT as SoT')
            ->first();

            $rankQuery = Player::join('stats', 'players.stat_id', '=', 'stats.id')
                ->where('players.club_id', $club_id)
                ->orderByDesc('stats.SoT')
                ->select('stats.SoT');
            $ranks = $rankQuery->pluck('SoT')->all();
            $rank = array_search($currentPlayerRank->SoT, $ranks) + 1;



        $currentPlayerRank_leg = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.id', $authPlayer->id)
            ->select('players.*', 'stats.G_Sh as G_Sh')
            ->first();

            $rankQuery_Leg = Player::join('stats', 'players.stat_id', '=', 'stats.id')
                ->orderByDesc('stats.G_Sh')
                ->select('stats.G_Sh');
            $ranks_leg = $rankQuery_Leg->pluck('G_Sh')->all();
            $rank_leg = array_search($currentPlayerRank_leg->G_Sh, $ranks_leg) + 1;



        $currentPlayerRankGoal = Player::join('stats', 'players.stat_id', '=', 'stats.id')

            ->where('players.id', $authPlayer->id)
            ->select('players.*', 'stats.Goals as Goals')
            ->first();

        $rankQueryGoal = Player::join('stats', 'players.stat_id', '=', 'stats.id')

            ->orderByDesc('stats.Goals')
            ->select('stats.Goals');

        $ranksGoals = $rankQueryGoal->pluck('Goals')->all();
        $TopGoals = array_search($currentPlayerRankGoal->Goals, $ranksGoals) + 1;





        $random_clubs = Club::all()->random(5);
        $tables = Standing::all()->take(10);



        $topLegScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')

            ->orderByDesc('stats.Goals')
            ->select('players.*', 'stats.Goals as Goals')
            ->take(6)->get();

        $topAssisterLeg =Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.Assists')
            ->select('players.*', 'stats.Assists as Assists')
            ->take(6)->get();


        return view('Dashboard.Player_Dashboard.dashboard', compact(
            'player',
            'players',
            'count_p',
            'club_id',
            'clubs',
            'player_id',
            'tables'
            ,'clubDS'
            ,'random_clubs'
            ,'topLegScorer'
            ,'topAssisterLeg'
            ,'club'
            ,'topGoalScorer'
            ,'topAssister'
            ,'rank'
            ,'rank_leg'
            ,'TopGoals'
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

    public function club_info(){
        $player = auth()->guard('player')->user();
        $club = $player->club;
        $tables = Standing::where('club_id', $club->id)->get();
        $clubs=Standing::where('club_id', $club->id)->get();
        $club_history = History::where('club_id', $club->id)->get();
        $player = auth()->guard('player')->user();

        $clubId = $player->club_id;
        $club_st = Club::where('id', $clubId)->find($clubId);
        $club = Player::with('club')->where('club_id', $clubId)->get();
        $count_p = $club->count();
        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $clubId)
            ->orderByDesc('stats.Goals')
            ->inRandomOrder()
            ->select('players.*', 'stats.Goals as Goals')
            ->first();

        $topGoalScorers = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $clubId)
            ->orderByDesc('stats.Goals')
            ->limit(5)
            ->select('players.*', 'stats.Goals as Goals')
            ->get();

        $topAssisters = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $clubId)
            ->orderByDesc('stats.Assists')
            ->limit(5)
            ->select('players.*', 'stats.Assists as Assists')
            ->get();


        $topAssister = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $clubId)
            ->orderByDesc('stats.Assists')
            ->inRandomOrder()
            ->select('players.*', 'stats.Assists as Assists')
            ->first();

        $topPlayer= Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $clubId)
            ->orderByDesc('stats.MP')
            ->inRandomOrder()
            ->select('players.*', 'stats.MP as MP')
            ->first();


        $upcomingMatches = DB::table('fixtures')
            ->where('date', '>=', now())
            ->orderBy('date', 'asc')
            ->get();







        return view('Dashboard.Player_Dashboard.your_club_info'
            ,compact('player',  'club',  'tables' , 'club_st','count_p'
                ,'upcomingMatches'
                ,'topGoalScorer', 'topAssister', 'topPlayer' , 'club_history'
                ,'topGoalScorers'
                ,'topAssisters'
                ,'clubs'


            ));
    }

    public function epl_stats(Request $request)
    {
        $player = auth()->guard('player')->user();
        $clubId = $player->club_id;

        $players = Player::where('club_id', '!=', $clubId)->get();
        $clubs=Club::all();

        return view('Dashboard.Player_Dashboard.epl_stats', compact('players'
            ,'clubs'

        ));
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


    public function rating()
    {
        $player = auth()->guard('player')->user();
        $club_id = $player->club_id;
        $player_id = $player->id;
        $random_clubs = Club::all()->random(15);
        $clubs=Club::all()->random(1);
        $authPlayer = Auth::guard('player')->user();


        #######################################################################################################
        $currentPlayerRank = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->where('players.id', $authPlayer->id)
            ->select('players.*', 'stats.SoT as SoT')
            ->first();
        $rankQuery = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.SoT')
            ->select('stats.SoT');
        $ranks = $rankQuery->pluck('SoT')->all();
        $rank = array_search($currentPlayerRank->SoT, $ranks) + 1;
        #######################################################################################################
        $currentPlayerRankPass = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->where('players.id', $authPlayer->id)
            ->select('players.*', 'stats.PasTotCmp as PasTotCmp')
            ->first();

        $rankQueryPass = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.PasTotCmp')
            ->select('stats.PasTotCmp');
        $ranksPass = $rankQueryPass->pluck('PasTotCmp')->all();
        $rankPass = array_search($currentPlayerRankPass->PasTotCmp, $ranksPass) + 1;
        #######################################################################################################
        $currentPlayerRankShoot = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->where('players.id', $authPlayer->id)
            ->select('players.*', 'stats.Shots as Shots')
            ->first();

        $rankQueryShoot = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.Shots')
            ->select('stats.Shots');
        $ranksShoot = $rankQueryShoot->pluck('Shots')->all();
        $rankShoot = array_search($currentPlayerRankShoot->Shots, $ranksShoot) + 1;
        #######################################################################################################
        $currentPlayerRankGoal = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->where('players.id', $authPlayer->id)
            ->select('players.*', 'stats.Goals as Goals')
            ->first();

        $rankQueryGoal = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.Goals')
            ->select('stats.Goals');

        $ranksGoals = $rankQueryGoal->pluck('Goals')->all();
        $TopGoals = array_search($currentPlayerRankGoal->Goals, $ranksGoals) + 1;
        #######################################################################################################

        $currentPlayerRankAssists = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->where('players.id', $authPlayer->id)
            ->select('players.*', 'stats.Assists as Assists')
            ->first();

        $rankQueryAssists = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->where('players.club_id', $club_id)
            ->orderByDesc('stats.Assists')
            ->select('stats.Assists');

        $ranksAssists = $rankQueryAssists->pluck('Assists')->all();
        $TopAssists = array_search($currentPlayerRankAssists->Assists, $ranksAssists) + 1;

        #######################################################################################################











        return view('Dashboard.Player_Dashboard.rating' ,compact(
            'random_clubs' ,
            'player',
            'club_id' ,
            'player_id' ,
            'clubs'
            ,'rank'
            ,'rankPass'
            ,'rankShoot'
            ,'TopGoals'
            ,'TopAssists'
        ));
    }
    public function task()
    {
        $player = auth()->guard('player')->user();
        $club_id = $player->club_id;
        $player_id = $player->id;
        $tasks = Task::with('player')->where('player_id', $player_id)->get();






        return view('Dashboard.Player_Dashboard.task' , compact('tasks' , 'player'  ));
    }


    public function compare()
    {
        return view('Dashboard.Player_Dashboard.compare');
    }

















}
