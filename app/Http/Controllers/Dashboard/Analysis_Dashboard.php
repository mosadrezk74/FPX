<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Analysis_Dashboard extends Controller
{
    public function index()
    {
        return view('Dashboard.Analysis_Dashboard.dashboard');
    }
}
