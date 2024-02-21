<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {   $annonces = Annonce::with('images', 'user')
        ->where('statu', 1)
        ->orderByDesc('vue')
        ->orderByDesc('like')
        ->paginate(100);

        $annoncestop = $annonces->splice(0, 5); // Séparer les 5 premières annonces les plus vues

        return view('welcome', compact('annonces', 'annoncestop'));
    }
}
