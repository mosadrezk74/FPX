<?php

namespace App\Http\Controllers\Dashboard;

use App\Charts\ExpensesChart;
use App\Http\Controllers\Controller;
use App\Models\Standing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class Admin_Dashboard extends Controller
{

    public function index()
    {
        $tables=Standing::all()->take(10);
         return view('Dashboard.Admin.dashboard'
        , compact('tables' )


        );
    }




}
