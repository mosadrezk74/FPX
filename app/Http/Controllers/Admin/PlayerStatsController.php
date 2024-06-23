<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Player;
use App\Models\Statistics;
use Illuminate\Http\Request;

class PlayerStatsController extends Controller
{

    public function index()
    {
        $stats=Statistics::paginate(20);

        return view('Dashboard.Player_stats.index' , compact('stats' ) );
     }
    public function getPlayers($clubId)
    {
        $club = Club::findOrFail($clubId);
        $players = $club->players;

        return response()->json($players);

    }

    public function create()
    {

        $clubs = \App\Models\Club::all();

        return view('Dashboard.Player_stats.create',compact('clubs'));

    }

}