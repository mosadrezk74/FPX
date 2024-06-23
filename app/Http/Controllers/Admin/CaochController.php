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
        $coaches = Coach::with('club')->get();
        $clubs = Club::all();
        $countries = Country::all();


        return view(
            'Dashboard.Coach.index',
            compact('coaches', 'clubs', 'countries')
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:coaches,email',
            'password' => 'required|string|min:8',
            'nationality' => 'required|string|max:255',
            'club_id' => 'required|exists:clubs,id',
        ]);


        $coach = new Coach();
        $coach->name_ar = $validatedData['name_ar'];
        $coach->name_en = $validatedData['name_en'];
        $coach->email = $validatedData['email'];
        $coach->password = bcrypt($validatedData['password']);
        $coach->photo = $request->photo;
        $coach->nationality = $validatedData['nationality'];
        $coach->club_id = $validatedData['club_id'];

        $coach->save();
        session()->flash('success', trans('index.added_successfully'));
        return redirect()->route('coach.index');
    }


    public function edit($id)
    {
        $coach = Coach::findOrFail($id);
        \Log::info($coach);
        return view('Dashboard.Coach_Dashboard.Auth.profile', compact('coach'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'photo' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6',
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
