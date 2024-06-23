<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\History;
use App\Models\Player;
use App\Models\Standing;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Coach_Dashboard extends Controller
{
    public function index()
    {
        $coach = auth()->guard('coach')->user();
        $club_id = $coach->club_id;
        $clubDS = Club::all();
        $clubs = Standing::where('club_id', $club_id)->get();
        $club = Player::with('club')->where('club_id', $club_id)->get();
        $count_p = $club->count();
        $players = Player::with('club')
            ->where('club_id', $club_id)
            ->inRandomOrder()
            ->take(7)
            ->get();
        $tables = Standing::all()->take(10);

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
            ->take(6)->get();
        $topAssisterLeg = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc(DB::raw('stats.Assists * stats.MP'))
            ->select('players.*', 'stats.Assists as Assists', 'stats.MP as MP')
            ->take(6)->get();

        return view('Dashboard.Coach_Dashboard.dashboard', compact(
            'coach',
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

    public function stats()
    {
        $coach = auth()->guard('coach')->user();
        $club_id = $coach->club_id;
        $players = Player::where('club_id', $club_id)->with('club')->paginate(35);
        $clubs = Club::all();
        $random_clubs = Club::all()->random(5);

        return view('Dashboard.Coach_Dashboard.stats', compact('coach', 'players', 'clubs', 'club_id', 'random_clubs'));
    }

    public function show($playerId)
    {
        $player = Player::with(['club', 'stat'])->findOrFail($playerId);
        $random_clubs = Club::all()->random(5);

        return view('Dashboard.Coach_Dashboard.show_player', compact('player', 'random_clubs'));
    }

    public function print(string $id)
    {
        $player = Player::findOrFail($id);

        return view('Dashboard.Coach_Dashboard.print', compact('player'));
    }

    public function club_info()
    {
        $coach = auth()->guard('coach')->user();
        $club_id = $coach->club_id;
        $club = Player::with('club')->where('club_id', $club_id)->get();
        $count_p = $club->count();
        $tables = Standing::where('club_id', $club_id)->get();
        $club_history = History::where('club_id', $club_id)->get();
        $clubId = $coach->club_id;
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


        return view('Dashboard.Coach_Dashboard.your_club_info', compact(
            'coach',
            'club',
            'tables',
            'count_p',

            'topGoalScorer',
            'topAssister',
            'topPlayer',
            'club_history',
            'topGoalScorers',
            'topAssisters',
            'club_st'
        ));
    }

    public function epl_stats(Request $request)
    {
        $coach = auth()->guard('coach')->user();
        $club_id = $coach->club_id;
        $players = Player::where('club_id', '!=', $club_id)->get();
        $clubs = Club::all();

        return view('Dashboard.Coach_Dashboard.epl_stats', compact('players', 'clubs'));
    }

    public function compare()
    {
        return view('Dashboard.Coach_Dashboard.compare');
    }

    public function comparePlayers(Request $request)
    {
        $player1Name = $request->input('player1');
        $player2Name = $request->input('player2');
        $player1 = Player::where('name_ar', $player1Name)
            ->orWhere('name_en', $player1Name)
            ->first();
        $player2 = Player::where('name_ar', $player2Name)
            ->orWhere('name_en', $player2Name)
            ->first();

        if (!$player1 || !$player2) {
            return redirect()->back()->with('error', 'One or both players not found');
        }

        return view('Dashboard.Coach_Dashboard.compartion', compact('player1', 'player2'));
    }



    public function createReport()
    {
        $coach = auth()->guard('coach')->user();
        $tasks = Task::whereHas('player', function ($query) use ($coach) {
            $query->where('club_id', $coach->club_id);
        })->get();

        return view('Dashboard.Coach_Dashboard.Report.index', compact('tasks'));
    }

    public function addReport()
    {
        $coach = auth()->guard('coach')->user();
        $club_id = $coach->club_id;
        $players = Player::with('club')->where('club_id', $club_id)->get();

        return view('Dashboard.Coach_Dashboard.Report.create', compact('players', 'club_id'));
    }

    public function store(Request $request)
    {
        $tasks = new Task();
        $tasks->player_id = $request->player_id;
        $tasks->priority = $request->priority;
        $tasks->descr = $request->descr;
        $tasks->category = $request->category;
        $tasks->num = $request->num;
        $tasks->save();
        session()->flash('add');

        return redirect()->back();
    }



    public function ajaxRequest(Request $request)
    {
        $player = Player::find($request->user_id);
        $response = auth()->user()->toggleFollow($player);

        return response()->json(['success' => $response]);
    }
}
