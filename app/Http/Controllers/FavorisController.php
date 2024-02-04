<?php

namespace App\Http\Controllers;

use App\Models\Favoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavorisController extends Controller
{
    public function index()
    {
        $favoris = Favoris::where('user_id', auth()->id())
            ->with('annonce.images')
            ->paginate(15);

        return view('userfavoris', compact('favoris'));
    }
}
