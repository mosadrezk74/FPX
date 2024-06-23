<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Country;
use App\Models\Player;
use App\Models\Statistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('club', 'stat')->get();
        $clubs = Club::all();
        return view('Dashboard.Players.index', compact('players', 'clubs'));
    }

    public function create()
    {
        $players = Player::with('club')->get();
        $clubs = Club::all();
        $countries = Country::all();
        $player_stats = Statistics::all();

        return view('Dashboard.Players.create', compact('players', 'clubs', 'countries', 'player_stats'));
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'name_ar' => 'required|string|max:25',
                'name_en' => 'required|string|max:25',
                'nationality' => 'required|string|max:25',
                'position' => 'required|string|max:50',
                'club_id' => 'required|exists:clubs,id',
                'email' => 'required|email|unique:players,email',
                'password' => 'required|string|min:6',
                'photo' => 'required',
                'age' => 'required',
                'weight' => 'required',
                'height' => 'required',
                'shirt_number' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route('player.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $player = new Player();
            $player->name_ar = $request->name_ar;
            $player->name_en = $request->name_en;
            $player->nationality = $request->nationality;
            $player->position = $request->position;
            $player->stat_id = $request->stat_id;
            $player->club_id = $request->club_id;
            $player->email = $request->email;
            $player->password = Hash::make($request->password);
            $player->photo = $request->photo;
            $player->weight = $request->weight;
            $player->height = $request->height;
            $player->age = $request->age;
            $player->rate = $request->rate;
            $player->shirt_number = $request->shirt_number;

            $player->save();

            session()->flash('success', 'Player added successfully.');

            return redirect()->route('player.create');
        } catch (ValidationException $e) {
            return redirect()->route('player.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->route('player.create')->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }


    public function edit(string $id)
    {
        $player = Player::findOrFail($id);
        \Log::info($player);
        $player_stats = Statistics::all();
        $countries = Country::all();
        $clubs = Club::all();

        return view('Dashboard.Players.edit', compact('player', 'player_stats', 'countries', 'clubs'));
    }

    /**
     * Update the specified player in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'nullable|string',
            'name_en' => 'nullable|string',
            'photo' => 'nullable|string',
            'email' => 'nullable|email',
            'password' => 'nullable|min:6',
        ]);

        $player = Player::findOrFail($id);

        $player->name_ar = $request->input('name_ar', $player->name_ar);
        $player->name_en = $request->input('name_en', $player->name_en);
        $player->email = $request->input('email', $player->email);
        $player->photo = $request->input('photo', $player->photo);
        $player->stat_id = $request->input('stat_id', $player->stat_id);
        $player->nationality  = $request->input('nationality', $player->nationality);


        if ($request->filled('password')) {
            $player->password = bcrypt($request->password);
        }

        $player->save();

        session()->flash('update');
        if (App::getlocale() == 'ar') {
            return redirect()->back()->with('success', 'تم تحديث بياناتك بنجاح');
        } else {
            return redirect()->back()->with('success', 'Your data has been updated successfully');
        }
    }



    public function destroy($id)
    {
        try {
            $player = Player::findOrFail($id);
            $player->delete();

            session()->flash('delete', 'Player deleted successfully.');

            return redirect()->route('player.index');
        } catch (\Exception $e) {
            return redirect()->route('player.index')->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }


    public function getAvailableShirtNumbers($club_id)
    {
        $takenShirtNumbers = Player::where('club_id', $club_id)->pluck('shirt_number')->toArray();
        $allShirtNumbers = range(1, 99);
        $availableShirtNumbers = array_diff($allShirtNumbers, $takenShirtNumbers);

        \Log::info('Club ID: ' . $club_id);
        \Log::info('Available Shirt Numbers: ' . implode(', ', $availableShirtNumbers));

        return response()->json($availableShirtNumbers);
    }
}
