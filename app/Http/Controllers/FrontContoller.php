<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Player;
use Illuminate\Http\Request;

class FrontContoller extends Controller
{
    public function index()
    {
        $clubs_count=Club::all()->where('status',1)->count();
        $clubs=Club::all()->where('status',1);
        $player_count=Player::all()->count();

        ###########################################################
        return view('Website.index'
        ,compact('clubs_count' , 'clubs' , 'player_count'
            )
        );
        ############################################################
    }

    public function player()
    {
        return view('Website.players');
    }
    ############################################################
    public function contact()
    {
        return view('Website.contact');
    }



}
