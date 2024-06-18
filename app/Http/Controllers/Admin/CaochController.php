<?php

namespace App\Http\Controllers\Admin;

use App\Models\Club;

use App\Models\Coach;
use App\Models\Player;
use GuzzleHttp\Client;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CaochController extends Controller
{

    public function index()
    {
        $coaches=Coach::with('club')->get();
        $clubs=Club::all();
        $countries=Country::all();


        return view('Dashboard.Coach.index'
        ,compact('coaches','clubs' , 'countries' ));
    }



    public function calendar(){
        return view('Dashboard.Coach.calendar');
    }




    public function store(Request $request)
    {
        $coaches=new Coach();
        $coaches->name_ar=$request->name_ar;
        $coaches->name_en=$request->name_en;
        $coaches->email = $request->email;
        $coaches->password = password_hash($request->password, PASSWORD_BCRYPT);
        $coaches->photo = $request->photo;
        $coaches->nationality=$request->nationality;
        $coaches->club_id=$request->club_id;

        $coaches->save();
        session()->flash('add');
        return redirect()->route('coach.index');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coach = Coach::findOrFail($id);
        \Log::info($coach);
        return view('Dashboard.Coach_Dashboard.Auth.profile', compact('coach'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'nullable|string',
            'name_en' => 'nullable|string',
            'photo' => 'nullable|string',
            'email' => 'nullable|email',
            'password' => 'nullable|min:6',
        ]);

        $coach = Coach::findOrFail($id);

        $coach->name_ar = $request->input('name_ar', $coach->name_ar);
        $coach->name_en = $request->input('name_en', $coach->name_en);
        $coach->email = $request->input('email', $coach->email);
        $coach->photo = $request->input('photo', $coach->photo);


        if ($request->filled('password')) {
            $coach->password = bcrypt($request->password);
        }

        $coach->save();

        session()->flash('update');
        return redirect()->back()->with('success', 'تم تحديث بياناتك بنجاح');
    }



    public function destroy(string $id)
    {
        try {
            $coach = Coach::findOrFail($id);
            $coach->delete();

            session()->flash('delete', 'Coach deleted successfully.');

            return redirect()->route('coach.index');
        } catch (\Exception $e) {
            return redirect()->route('coach.index')->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
}
