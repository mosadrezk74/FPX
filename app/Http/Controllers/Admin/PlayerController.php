<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $players = \App\Models\Player::with('club')->get();
        $clubs = \App\Models\Club::all();
        return view('Dashboard.Players.index',compact('players' ,'clubs' ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $players = \App\Models\Player::with('club')->get();
        $clubs = \App\Models\Club::all();
        return view('Dashboard.Players.create',compact('players' ,'clubs' ));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $players = new \App\Models\Player();
        $players->name_ar=$request->name_ar;
        $players->name_en=$request->name_en;
        $players->nationality=$request->nationality;
        $players->age=$request->age;
        $players->height=$request->height;
        $players->position=$request->position;
        $players->shirt_number=$request->shirt_number;
        $players->club_id=$request->club_id;
        $players->email = $request->email;
        $players->password = Hash::make($request->password);


        if($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/players/', $filename);
            $players->photo = $filename;
        }
        $players->save();
        session()->flash('add');

        return redirect()->route('player.create');


    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
