<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Image;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
{
    public function show($id)
    {
        $annonce = Annonce::where('id', $id)->first();

        if (!$annonce) {
            abort(404);
        }

        $images = DB::table('annonces')
            ->join('images', 'annonces.id', '=', 'images.annonce_id')
            ->select('images.url_image AS image_url')
            ->where('annonces.id', $id)
            ->get();

        return view('annonces.show', compact('annonce', 'images'));
    }
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
    public function showAnnoncesWithImages(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
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


        $annonce = Annonce::findOrFail($id);


        $annonce->titre = $request->input('titre');
        $annonce->description = $request->input('description');
        $annonce->prix= $request->input('prix');
        $annonce->categorie=$request->input('categorie');


        $annonce->save();

        return redirect()->route('userannonce')->with('id','');
    }
}

