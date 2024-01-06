<?php

namespace App\Livewire;

use Livewire\Component;

class Addannonce extends Component
{
    public $nom;
    public $description;
    public $categories = [];
    public $descriptionDetaillee;
    public $prix;
    public $photos;

    public function render()
    {
        $categories = [
            ['id' => 1, 'nom' => 'Catégorie 1'],
            ['id' => 2, 'nom' => 'Catégorie 2'],
            // Ajoutez d'autres catégories selon vos besoins
        ];

        return view('livewire.addannonce', compact('categories'));
    }

    public function ajouterProduit()
    {
        // Ajoutez ici la logique pour enregistrer le produit dans la base de données
        // Utilisez les propriétés $nom, $description, $categories, $descriptionDetaillee, $prix et $photos
        // Assurez-vous de valider les données avant de les enregistrer
    }
}
