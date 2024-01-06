<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\fs;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Coach_Dashboard extends Controller
{

    public function index()
    {
        $coach = auth()->guard('coach')->user();
        $clubs=Club::all();
        $random = rand(1,10);
        $user = Auth::user();
        $club_id = $user->club_id;
        $club = Player::with('club')->where('club_id', $club_id)->get();
        $count_p = $club->count();





        return view('Dashboard.Coach_Dashboard.dashboard' , compact('coach' , 'random'
        ,'count_p'
            ,'clubs'
        ,'club_id'

        ));
    }

}
