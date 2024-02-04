<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $annonces = Annonce::with('images', 'user')->paginate(100);
        return view('welcome', compact('annonces'));
    }
}
