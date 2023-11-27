<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Coach;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CaochController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coaches=Coach::with('club')->get();
        $clubs=Club::all();
        $client = new Client();
        $response = $client->get('https://restcountries.com/v3.1/all');
        $countries = json_decode($response->getBody(), true);
        $countries = array_filter($countries, function ($country) {
            return $country['name']['common'] !== 'Israel';
        });
        $northAmerica = ["ca", "us", "mx"];
        $asia = ["cn", "jp", "in"];
        $countries = array_filter($countries, function ($country) use ($northAmerica, $asia) {
            $countryCode = strtolower($country['cca2']);
            return !in_array($countryCode, array_merge($northAmerica, $asia));
        });
        $countries = collect($countries)->sortBy('name.common')->all();


        return view('Dashboard.Coach.index',
        ['countries' => $countries]
        ,compact('coaches','clubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coaches=new Coach();
        $coaches->name_ar=$request->name_ar;
        $coaches->name_en=$request->name_en;
        $coaches->email = $request->email;
        $coaches->password = password_hash($request->password, PASSWORD_BCRYPT);
        if($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/coach_logo/', $filename);
            $coaches->photo = $filename;
        }
        $coaches->age=$request->age;
        $coaches->nationality=$request->nationality;
        $coaches->club_id=$request->club_id;

        $coaches->save();
        session()->flash('add');
        return redirect()->route('coach.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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
