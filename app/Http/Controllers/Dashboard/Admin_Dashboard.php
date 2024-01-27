<?php

namespace App\Http\Controllers\Dashboard;

use App\Charts\ExpensesChart;
use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Standing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class Admin_Dashboard extends Controller
{

    public function index()
    {
        $tables=Standing::all()->take(12);


        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')

            ->orderByDesc('stats.totalGoals')
            ->select('players.*', 'stats.totalGoals as totalGoals')
            ->first();

        $topAssister = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.goalAssists')
            ->select('players.*', 'stats.goalAssists as goalAssists')
            ->first();



         return view('Dashboard.Admin.dashboard'
        , compact('tables' ,'topGoalScorer'

             ,'topAssister'
             ));
    }




}
