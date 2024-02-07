<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
   public function show(Request $request){
       $categorie = $request->input('categorie');
       $annonces = Annonce::with('images', 'user')->where('categorie',$categorie)->paginate(100);
       return view('welcome', compact('annonces'));

    }
}
