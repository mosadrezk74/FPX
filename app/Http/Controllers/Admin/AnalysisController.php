<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analysis;
use App\Models\Statistics;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AnalysisController extends Controller
{

    public function index()
    {
        $analyses=Analysis::all();

        return view('Dashboard.Analysis.index' , compact('analyses') );
    }




    public function create()
    {

        return view('Dashboard.Analysis.create');

    }


    public function store(Request $request)
    {
        try {
            $analysis = new Analysis();
            $analysis->name_ar = $request->name_ar;
            $analysis->name_en = $request->name_en;
            $analysis->email = $request->email;
            $analysis->password = password_hash($request->password, PASSWORD_BCRYPT);
            $analysis->status = $request->status;

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/analysis/', $filename);
                $analysis->photo = $filename;
            }

            $analysis->save();
            session()->flash('add');

            return redirect()->route('analysis.create')->with('success', 'Analysis created successfully.');
        } catch (ValidationException $e) {
            return redirect()->route('analysis.create')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->route('analysis.create')->with('error', 'An unexpected error occurred while creating analysis.');
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy($id)
    {
        try {
            $player = \App\Models\Player::findOrFail($id);

            if ($player->photo) {
                $photoPath = public_path('uploads/players/' . $player->photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            $player->delete();

            session()->flash('delete');

            return redirect()->route('player.index');
        } catch (\Exception $e) {
            return redirect()->route('player.index')->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
}
