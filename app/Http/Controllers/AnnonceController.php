<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string|in:option1,option2,option3,option4',
            'prix' => 'required|numeric',
        ]);
        $statu=false;
        $userId = Auth::id();
        $validatedData['user_id']=$userId;
        $validatedData['statu']=$statu;
        $annonce = Annonce::create($validatedData);
        return redirect()->route('userannonce');

    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $annonce = Annonce::findOrFail($id);


        $annonce->delete();


        return redirect()->route('userannonce');
    }
    public function showAnnoncesWithImages()
    {
        $annonces = Annonce::with('image')->get();
        return view('layouts.home', ['annonces' => $annonces]);
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string',
        ]);


        // Récupérer l'annonce à mettre à jour
        $annonce = Annonce::findOrFail($id);

        // Mettre à jour les champs de l'annonce
        $annonce->titre = $request->input('titre');
        $annonce->description = $request->input('description');
        $annonce->prix= $request->input('prix');
        $annonce->categorie=$request->input('categorie');

        // Enregistrer les modifications
        $annonce->save();

        return redirect()->route('userannonce')->with('id','');
    }
}

