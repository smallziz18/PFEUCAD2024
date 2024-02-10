<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $annonces = Annonce::with('images', 'user')
            ->where('statu',1)
            ->orderByDesc('like')

            ->paginate(100);
        return view('welcome', compact('annonces'));
    }
}
