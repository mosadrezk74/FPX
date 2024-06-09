<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Coach;
use App\Models\Country;
use App\Models\Player;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
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
        $coach = auth()->guard('coach')->user();


        $coach_id = Coach::findOrFail($id);
         return view('Dashboard.Coach_Dashboard.Auth.profile', compact('coach','coach_id',
             ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'email',
            'password' => 'nullable|min:6',
        ]);

        $coach = Coach::findOrFail($id);

        $coach->name_ar = $request->name_ar;
        $coach->name_en = $request->name_en;
        $coach->email = $request->email;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/coach_logo'), $imageName);

            $oldPhotoPath = public_path('uploads/coach_logo/') . $coach->photo;
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }

            $coach->photo = $imageName;
        }

        if ($request->has('password')) {
            $coach->password = bcrypt($request->password);
        }

        $coach->save();

        session()->flash('update');
        return redirect()->back()->with('success', 'تم تحديث بياناتك بنجاح');
    }

    public function destroy(string $id)
    {
        //
    }
}
