<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;

class PlayerStatsController extends Controller
{

    public function index()
    {
        return view('Dashboard.Player_stats.index');
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


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
