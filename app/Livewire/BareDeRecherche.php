<?php

namespace App\Livewire;

use Livewire\Component;

class BareDeRecherche extends Component
{
public String $query = '';
    public function render()
    {
        return view('livewire.bare-de-recherche');
    }
}
