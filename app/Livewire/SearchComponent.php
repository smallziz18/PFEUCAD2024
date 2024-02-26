<?php

namespace App\Livewire;

use App\Models\Annonce;
use Livewire\Component;

class SearchComponent extends Component
{


    public $searchTerm = '';
    public $results = [];

    public function updatedSearchTerm()
    {
        if (strlen($this->searchTerm) >= 3) {
            $this->results = Annonce::where('titre', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('description', 'like', '%'.$this->searchTerm.'%')
                ->get()
                ->toArray();
        } else {
            $this->results = [];
            dd($this->results);
        }

    }

    public function render()
    {
        return view('livewire.search-component');
    }
}
