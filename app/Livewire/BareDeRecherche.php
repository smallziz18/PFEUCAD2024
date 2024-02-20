<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Annonce;

class BareDeRecherche extends Component
{
    public $searchTerm;
    public $category;
    public $minPrice;
    public $maxPrice;
    public $annonces;

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Vérifie si la longueur de $searchTerm est supérieure ou égale à 3 avant de lancer la recherche
        if (!is_null($this->searchTerm) && strlen($this->searchTerm) >= 3) {
            $this->annonces = Annonce::query()
                ->when($this->searchTerm, function ($query) {
                    $query->where('titre', 'like', '%' . $this->searchTerm . '%');
                })
                ->when($this->category, function ($query) {
                    $query->where('categorie', $this->category);
                })
                ->when($this->minPrice, function ($query) {
                    $query->where('prix', '>=', $this->minPrice);
                })
                ->when($this->maxPrice, function ($query) {
                    $query->where('prix', '<=', $this->maxPrice);
                })
                ->get();


        } else {
            // Réinitialise la variable $annonces si la longueur de $searchTerm est inférieure à 3
            $this->annonces = [];
        }

        return view('livewire.bare-de-recherche');
    }
}
