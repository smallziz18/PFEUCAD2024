<?php

namespace App\Livewire;

use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Addannonce extends Component
{
    public $titre;
    public $description;
    public $categories = [];
    public $categorie;
    public $descriptionDetaillee;
    public $prix;

    public $photos;

    public function render()
    {
        $categorie = [
            ['id' => 1, 'nom' => 'Catégorie 1'],
            ['id' => 2, 'nom' => 'Catégorie 2'],
            // Ajoutez d'autres catégories selon vos besoins
        ];

        return view('livewire.addannonce', compact('categorie'));
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
        $this->titre = '';
        $this->prix = '';
        $this->description = '';


        // Envoyer un message de succès
        session()->flash('message', 'Annonce enregistrée avec succès.');
    }

}
