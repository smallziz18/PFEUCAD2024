<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Favoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavorisController extends Controller
{
    public function index()
    {
        $favoris = Favoris::where('user_id', auth()->id())
            ->with('annonce.images')
            ->paginate(15);

        return view('userfavoris', compact('favoris'));
    }
    public function delete($id)
    {
        $favori = Favoris::where('annonce_id', $id)->delete();

        return redirect()->back()->with('message', 'Supprimé avec succès')->with('status', 'danger');
    }

    public function ajouter($id)
    {
        $favori = Favoris::create([
            'user_id' => Auth::id(),
            'annonce_id' => $id
        ]);

        return redirect()->back()->with('message', 'Ajouté avec succès')->with('status', 'success');
    }

}
