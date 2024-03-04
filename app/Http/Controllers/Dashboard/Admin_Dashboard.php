<?php

namespace App\Http\Controllers\Dashboard;

use App\Charts\ExpensesChart;
use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Coach;
use App\Models\History;
use App\Models\Player;
use App\Models\Standing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class Admin_Dashboard extends Controller
{

    public function index()
    {
        $tables=Standing::all()->take(12);

        $recentes = Player::latest()->take(16)->get();


        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')

            ->orderByDesc('stats.totalGoals')
            ->select('players.*', 'stats.totalGoals as totalGoals')
            ->first();

        $topAssister = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.goalAssists')
            ->select('players.*', 'stats.goalAssists as goalAssists')
            ->first();

        $clubs=Club::all()->where('status',1);
        $clubs_count=Club::all()->where('status',1)->count();
        $coaches=Coach::all();
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

            ->orderByDesc('stats.totalGoals')
            ->select('players.*', 'stats.totalGoals as totalGoals')
            ->take(6)->get();

        $topAssisterLeg =Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.goalAssists')
            ->select('players.*', 'stats.goalAssists as goalAssists')
            ->take(6)->get();


        $topAppearancesLeg = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.Appearances')
            ->select('players.*', 'stats.Appearances as Appearances')
            ->take(6)
            ->get()
            ->shuffle()
            ->take(6);




        return view('Dashboard.Admin.dashboard'
        , compact('tables' ,'topGoalScorer'
             ,'topAssister'
                 ,'recentes'
                 ,'clubs'
                 ,'coaches'
                 ,'topClubs'
             ,'count_users'
             ,'clubs_count'
             ,'topClubsInHistory'
             ,'topAssisterLeg'
             ,'topLegScorer'
             ,'topAppearancesLeg'
             ));
    }




}
