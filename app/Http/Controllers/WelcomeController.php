<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $annoncestop = Annonce::with('images', 'user')
        ->where('statu', 1)
        ->orderByDesc('like')
        ->take(5)
        ->get();




        $annonces = Annonce::with('images', 'user')
            ->where('statu', 1)
            ->orderBy('vue')
            ->get();

        return view('welcome', compact('annonces','annoncestop'));
    }
}
