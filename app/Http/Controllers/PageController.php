<?php

namespace App\Http\Controllers;

use App\Models\FrontContact;
use App\Models\FrontSend;
use App\Models\Join;
use App\Models\User;
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

    #####################################################################
    public function contact_delete($id)
    {
        $con = FrontContact::findOrFail($id);
        $con->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }


    public function join_delete($id)
    {
        $jon = Join::findOrFail($id);
        $jon->delete();
        return redirect()->back()->with('success', 'message deleted successfully.');
    }

    public function send_delete($id)
    {
        $send = FrontSend::findOrFail($id);
        $send->delete();
        return redirect()->back()->with('success', 'message deleted successfully.');
    }
    #####################################################################
    public function send()
    {
        $messages=FrontSend::all();

        return view('Dashboard.Front_Pages.send' , compact('messages') );
    }
    #####################################################################

    public function fetch_user()
    {
        $users=User::all();
        return view('Dashboard.Front_Pages.users' , compact('users') );
    }
    public function user_delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }


}
