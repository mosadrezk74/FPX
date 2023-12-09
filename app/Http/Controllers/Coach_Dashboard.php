<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\fs;
use Illuminate\Http\Request;

class Coach_Dashboard extends Controller
{
 
    public function index()
    {
        $coach = auth()->guard('coach')->user();
        $clubs=Club::all();
        $random = rand(1,10);


        return view('Dashboard.Coach_Dashboard.dashboard' , compact('coach' , 'random'
        ,'clubs'));
    }

}
