<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Coach;
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
        if($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/coach_logo/', $filename);
            $coaches->photo = $filename;
        }
        $coaches->role=$request->role;
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
