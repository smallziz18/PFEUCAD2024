<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Favoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CommentaireController extends Controller
{
public function ajouter_commentaire(Request $request)
   {
       if (Auth::check()) {
           Commentaire::create([
               'user_id' => Auth::id(),
               'annonce_id' => $request->input('annonce_id'),
               'commentaire'=>$request->input('commentaire')
           ]);
           Session::flash('success', 'Le commentaire a été inséré avec succès.');

           return redirect()->back();

       }else{
           Redirect::route('login');
       }
   }
}
