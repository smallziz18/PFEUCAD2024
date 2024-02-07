<?php

namespace App\Livewire;

use App\Models\Annonce;
use Livewire\Component;

class BareDeRecherche extends Component
{
    public string $query = '';
    public $annonces = [];

    public function updatedQuery()
    {
        if (strlen($this->query) > 2)
        {
            $words = '%' . $this->query . '%';
            $this->annonces = Annonce::where(function ($query) use ($words) {
                $query->where("titre", 'like', $words)
                    ->orWhere("description", 'like', $words)
                    ->orWhere("categorie",'like',$words);
            })->get();

        }

    }

    public function render()
    {
        return view('livewire.bare-de-recherche');
    }
}
