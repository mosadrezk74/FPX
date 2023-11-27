<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Player;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{

    public function index()
    {

        $players = \App\Models\Player::with('club')->paginate(5);
         $clubs = \App\Models\Club::all();

        return view('Dashboard.Players.index',compact('players' ,'clubs' ));

    }


    public function create()
    {

        $players = \App\Models\Player::with('club')->get();
        $clubs = \App\Models\Club::all();
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
        return view('Dashboard.Players.create',
            ['countries' => $countries],
            compact('players' ,'clubs' ));

    }

    public function store(Request $request)
    {


        try {

            $rules = [
                'name_ar' => 'required|string|max:25',
                'name_en' => 'required|string|max:25',
                'nationality' => 'required|string|max:25',
                'age' => 'required',
                'height' => 'required|numeric',
                'position' => 'required|string|max:50',
                'shirt_number' => 'required|integer',
                'club_id' => 'required|exists:clubs,id',
                'email' => 'required|email|unique:players,email',
                'password' => 'required|string|min:6',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route('player.create')
                    ->withErrors($validator)
                    ->withInput();
            }

             $players = new \App\Models\Player();
            $players->name_ar = $request->name_ar;
            $players->name_en = $request->name_en;
            $players->nationality = $request->nationality;
            $players->age = $request->age;
            $players->height = $request->height;
            $players->position = $request->position;
            $players->shirt_number = $request->shirt_number;
            $players->club_id = $request->club_id;
            $players->email = $request->email;
            $players->password = password_hash($request->password, PASSWORD_BCRYPT);

            if ($request->hasFile('photo')) {
                 $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/players/', $filename);
                $players->photo = $filename;
            }

            $players->save();

            session()->flash('add');

            return redirect()->route('player.create');
        } catch (ValidationException $e) {

            return redirect()->route('player.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {

            return redirect()->route('player.create')->withErrors(['error' => 'An error occurred. Please try again.']);
        }



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
