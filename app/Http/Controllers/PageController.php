<?php

namespace App\Http\Controllers;

use App\Models\FrontContact;
use App\Models\FrontSend;
use App\Models\Join;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function join()
    {
        $messages=Join::all();
        return view('Dashboard.Front_Pages.join' , compact('messages'));
    }
    public function toggleStatus($status, $id)
    {
        $club = Join::find($id);
        $club->status = $status;
        $club->save();

        return redirect()->route('front.join')
            ->with('message', 'status successfully updated.');
    }

    public function toggleStatus_contact($status, $id)
    {
        $club = FrontContact::find($id);
        $club->status = $status;
        $club->save();

        return redirect()->route('front.contact')
            ->with('message', 'status successfully updated.');
    }



    public function contact()
    {
        $messages=FrontContact::all();

        return view('Dashboard.Front_Pages.contact' , compact('messages') );
    }



    public function send()
    {
        $messages=FrontSend::all();

        return view('Dashboard.Front_Pages.send' , compact('messages') );
    }
}
