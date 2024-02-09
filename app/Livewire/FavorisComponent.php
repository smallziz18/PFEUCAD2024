<?php

namespace App\Livewire;

use App\Models\Favoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use App\Models\Annonce;

class FavorisComponent extends Component


{
    public function toggleFavori($annonceId)
    {
        if (Auth::check()) {


            $favorisExist = Favoris::where('user_id', Auth::id())
                ->where('annonce_id', $annonceId)
                ->exists();

            if ($favorisExist) {
                Favoris::where('user_id', Auth::id())
                    ->where('annonce_id', $annonceId)
                    ->delete();


                session()->flash('message', 'Annonce retirée des favoris avec succès.');
                session()->flash('alert-class', 'alert-success');

            } else {
                Favoris::create([
                    'user_id' => Auth::id(),
                    'annonce_id' => $annonceId,
                ]);
                $annonce = Annonce::findOrFail($annonceId);
                $annonce->like++;
                $annonce->save();



                session()->flash('message', 'Annonce ajoutée aux favoris avec succès.');
                session()->flash('alert-class', 'alert-success');
            }
        }
        else{
           Redirect::route('login');
        }
    }



    public function render()
    {
        $annonces = Annonce::all();
        return view('livewire.favoris-component', compact('annonces'));
    }
}
