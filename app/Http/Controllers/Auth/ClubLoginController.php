<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\ClubRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ClubLoginController extends Controller
{
    public function create(): View
    {
        return view('Dashboard.Club_Dashboard.auth.signin');
    }

    public function store(ClubRequest $request): RedirectResponse
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::CLUB);
        } else {
            // Return to the login page
            return back()->with('MMMM');
        }

    }


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('club')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
