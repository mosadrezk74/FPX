<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class Admin_Dashboard extends Controller
{

    public function index()
    {






        return view('Dashboard.Admin.dashboard'
         );
    }


}
