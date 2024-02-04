<?php

namespace App\Livewire;

use App\Models\Favoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Annonce;

class FavorisComponent extends Component


{
    public function toggleFavori(int $annonceId): void
    {
        $favorisExist = Favoris::where('user_id', Auth::id())
            ->where('annonce_id', $annonceId)
            ->exists();

        if ($favorisExist) {
            Favoris::where('user_id', Auth::id())
                ->where('annonce_id', $annonceId)
                ->delete();

            $this->emit('favorisUpdated');

            session()->flash('message', 'Annonce retirée des favoris avec succès.');
        } else {
            Favoris::create([
                'user_id' => Auth::id(),
                'annonce_id' => $annonceId,
            ]);

            $this->emit('favorisUpdated');

            session()->flash('message', 'Annonce ajoutée aux favoris avec succès.');
        }
    }



    public function render()
    {
        $annonces = Annonce::all();
        return view('livewire.favoris-component', compact('annonces'));
    }
}
