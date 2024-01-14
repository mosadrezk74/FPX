<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Admin_Dashboard extends Controller
{

    public function index()
    {
        $data = json_decode(getApiData, true);

        return view('Dashboard.Admin.dashboard',
         ['data' => $data]
         );
    }

    public function getApiData($version, $sport)
    {
        // Replace 'your-api-token' with the actual API token
        $apiToken = 'hq9wKtsxIihiAr3Gl6TD6rFcbjEQiu4R8H1VHIr38wfp1HHEhu3bGXDwX7tL';

        // Replace 'your-base-url' with the actual base URL
        $baseUrl = 'https://api.sportmonks.com';

        // Make an HTTP GET request to the API endpoint
        $response = Http::get("{$baseUrl}/{$version}/{$sport}/standings", [
            'api_token' => $apiToken,
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            // Decode the JSON response
            $data = $response->json();

            // Pass the data to the Blade view
            return view('standings', ['data' => $data]);
        } else {

            return response()->json(['error' => 'Unable to fetch data from the API'], 500);
        }
    }

}
