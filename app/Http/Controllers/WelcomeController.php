<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {   $annoncestop = Annonce::with('images', 'user')
        ->where('statu', 1)
        ->orderByDesc('vue')
        ->take(5)
        ->get();


        $annoncestopIds = $annoncestop->pluck('id')->toArray();

        $annonces = Annonce::with('images', 'user')
            ->where('statu', 1)
            ->whereNotIn('id', $annoncestopIds)
            ->orderByDesc('created_at')
            ->get();

        return view('welcome', compact('annonces','annoncestop'));
    }
}
