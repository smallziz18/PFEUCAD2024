<?php

namespace App\Livewire;

use App\Models\Favoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Annonce;

class FavorisComponent extends Component


{
    public function toggleFavori($annonceId): void
    {

        $favorisExist = Favoris::where('user_id', Auth::id())
            ->where('annonce_id', $annonceId)
            ->exists();

        if ($favorisExist) {
            Favoris::where('user_id', Auth::id())
                ->where('annonce_id', $annonceId)
                ->delete();



            session()->flash('message', 'Annonce retirée des favoris avec succès.');
        } else {
            Favoris::create([
                'user_id' => Auth::id(),
                'annonce_id' => $annonceId,
            ]);



            session()->flash('message', 'Annonce ajoutée aux favoris avec succès.');
        }
    }



    public function render()
    {
        $annonces = Annonce::all();
        return view('livewire.favoris-component', compact('annonces'));
    }
}
