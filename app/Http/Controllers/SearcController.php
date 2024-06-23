<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class SearcController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $players = Player::where('name_ar', 'LIKE', "%$query%")
            ->orWhere('name_en', 'LIKE', "%$query%")
            ->orWhereHas('club', function ($queryBuilder) use ($query) {
                $queryBuilder->where('name_ar', 'LIKE', "%$query%");
                $queryBuilder->orwhere('name_en', 'LIKE', "%$query%");
            })
            ->get();

        return view('site.search-results', compact('players'));
    }
}
