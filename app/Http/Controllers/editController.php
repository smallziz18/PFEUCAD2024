<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class editController extends Controller
{
    public function show($id){
        $annonce = Annonce::where('id', $id)->first();

        return view('editannonce',compact('annonce'));
    }
    public function edit(Request $request)
    {

    }
}
