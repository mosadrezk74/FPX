<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs=Club::all();

        return view('Dashboard.Clubs.index' , compact('clubs') );
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
        $clubs=new Club();
        $clubs->name_ar=$request->name_ar;
        $clubs->name_en=$request->name_en;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/club_logo/', $filename);
            $clubs->image = $filename;
        }
        $clubs->date=$request->date;
        $clubs->save();

        return redirect()->route('club.index');





    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clubs=Club::findorFail($id);

        return view('Dashboard.Clubs.show' , compact('clubs') );

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
    function destroy($id)
    {
        Club::destroy($id);

        return back();
    }
}
