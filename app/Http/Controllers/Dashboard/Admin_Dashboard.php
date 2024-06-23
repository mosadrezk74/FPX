<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Coach;
use App\Models\History;
use App\Models\Player;
use App\Models\Standing;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class Admin_Dashboard extends Controller
{

    public function index()
    {
        $tables = Standing::all()->take(12);

        $recentes = Player::latest()->take(15)->get();


        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')

            ->orderByDesc('stats.Goals')
            ->select('players.*', 'stats.Goals as Goals')
            ->first();

        $topAssister = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc(DB::raw('stats.Assists * stats.MP'))
            ->select('players.*', 'stats.Assists as Assists', 'stats.MP as MP')
            ->first();


        $clubs = Club::all()->where('status', 1);
        $clubs_count = Club::all()->where('status', 1)->count();
        $coaches = Coach::all();
        ############################################
        $topClubs = Standing::select('team_en', 'gf')
            ->orderByDesc('gf')
            ->limit(4)
            ->get();
        ############################################
        $topClubsInHistory = History::select('name', 'total_points')
            ->orderByDesc('total_points')
            ->limit(6)
            ->get();
        ############################################

        $count_users = User::count();
        $topLegScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')

            ->orderByDesc('stats.Goals')
            ->select('players.*', 'stats.Goals as Goals')
            ->take(6)->get();

        $topAssisterLeg = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc(DB::raw('stats.Assists * stats.MP'))
            ->select('players.*', 'stats.Assists as Assists', 'stats.MP as MP')
            ->take(6)
            ->get();




        $topAppearancesLeg = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.MP')
            ->select('players.*', 'stats.MP as MP')
            ->get()
            ->shuffle()
            ->take(6);


        return view(
            'Dashboard.Admin.dashboard',
            compact(
                'tables',
                'topGoalScorer',
                'topAssister',
                'recentes',
                'clubs',
                'coaches',
                'topClubs',
                'count_users',
                'clubs_count',
                'topClubsInHistory',
                'topAssisterLeg',
                'topLegScorer',
                'topAppearancesLeg'

            )

        );
    }
}
