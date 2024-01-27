<?php

namespace App\Livewire;

use App\Models\Annonce;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Addannonce extends Component
{
    use WithFileUploads;
    public $titre;
    public $description;

    public $categorie;
    public $descriptionDetaillee;
    public $prix;

    public $images;

    public function render()
    {


        return view('livewire.addannonce');
    }

    public function ajouterProduit()
    {

       $annonce= Annonce::create([
            'titre' => $this->titre,
            'prix' => $this->prix,
            'user_id'=>Auth::id(),
            'description'=>$this->description,
            'categorie'=>$this->categorie,



            // Ajoutez d'autres champs si nécessaire
        ]);


        // Réinitialiser les propriétés après la sauvegarde
        $this->reset('titre','description','prix','categorie');




        // Envoyer un message de succès
        session()->flash('message', 'Annonce enregistrée avec succès.');
    }

}
