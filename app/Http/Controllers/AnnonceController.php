<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Commentaire;
use App\Models\Favoris;
use App\Models\Image;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class AnnonceController extends Controller

{


    public function ajouterProduit(Request $request): RedirectResponse

    {


        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string',
            'prix' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png|max:2048', // Les images doivent être de type jpeg ou png et ne pas dépasser 2 Mo
            'livrable'=>'required|boolean',
        ]);

        // Création de l'annonce
        $annonce = Annonce::create([
            'user_id' => Auth::id(),
            'titre' => $request->titre,
            'prix' => $request->prix,
            'description' => $request->description,
            'categorie' => $request->categorie,
            'livrable'=>$request->livrable,
        ]);

        // Traitement des images téléchargées
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                // Génération d'un nom de fichier unique
                $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();

                // Téléchargement de l'image et stockage dans le dossier public avec le nom généré
                $path = $image->storeAs('public/images', $imageName);

                // Création de l'enregistrement de l'image associée à l'annonce
                Image::create([
                    'annonce_id' => $annonce->id, // Associer l'image à l'annonce créée
                    'url_image' => 'storage/images/' . $imageName, // Stocker le chemin de l'image dans la base de données
                ]);
            }
        }


        // Message de succès
        session()->flash('message', 'Annonce ajoutée avec succès.');

        // Redirection vers une autre page ou affichage d'un message de succès
        return redirect()->to('annonceadded');
    }


    public function show($id)
    {
        $annonce = Annonce::where('id', $id)->first();
        $commentaire=Commentaire::where('annonce_id',$id)->get();
        $commentaireuser='';


        if (!$annonce) {
            abort(404);
        }

        $images = DB::table('annonces')
            ->join('images', 'annonces.id', '=', 'images.annonce_id')
            ->select('images.url_image AS image_url')
            ->where('annonces.id', $id)
            ->get();
        $user= User::where('id',$annonce->user_id)->first();
        $annonce->vue++;
        $annonce->save();

        return view('show', compact('annonce', 'images','user','commentaire','commentaireuser'));
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

    public function delete(Request $request){
        $id = $request->input('id');
        $annonce = Annonce::findOrFail($id);
        $images = Image::where('annonce_id', $id)->get();

        foreach ($images as $image) {
            if ($image->image_url){
            Storage::delete($image->image_url);
            }
            $image->delete();
        }

        Favoris::where('annonce_id', $id)->delete();

        $annonce->delete();
        return redirect()->route('userannonce');

    }


    public  function form()
    {
        return \view('addannonce');
    }

}

