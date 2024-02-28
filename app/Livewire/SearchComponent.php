<?php

namespace App\Livewire;

use App\Models\Annonce;
use Livewire\Component;

class SearchComponent extends Component
{


    public $results = [];
    public $searchTerm = '';

    public function render()
    {
        if (strlen($this->searchTerm) >= 1) {
            $this->results = Annonce::where('titre', 'like', '%' . $this->searchTerm . '%')->get();
        } else {
            // Réinitialise la variable $results si la longueur de $searchTerm est inférieure à 3
            $this->results = [];
        }

        return view('livewire.search-component', [
            'annonces' => $this->results,
        ]);
    }
}
