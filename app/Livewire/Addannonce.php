<?php

namespace App\Livewire;

use App\Models\Annonce;
use App\Models\Image;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Addannonce extends Component
{
    use WithFileUploads;

    public $titre;
    public $description;
    public $categorie;
    public $prix;
    public $images;

    public function render()
    {
        return view('livewire.addannonce');
    }

    public function ajouterProduit(Request $request)
    {
        $this->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string',
            'prix' => 'required|numeric',

        ]);

        $annonce = Annonce::create([
            'user_id' => Auth::id(),
            'titre' => $this->titre,
            'prix' => $this->prix,
            'description' => $this->description,
            'categorie' => $this->categorie,

        ]);
$file=$request->file('images');
if ($file->move('images',$file->getClientOriginalName())){
    echo"file";
}


        // Réinitialiser les propriétés après la sauvegarde
        $this->reset('titre', 'description', 'prix', 'categorie');

        // Envoyer un message de succès
        session()->flash('message', 'Annonce enregistrée avec succès.');
        return redirect()->to('annonceadded');

    }
}
