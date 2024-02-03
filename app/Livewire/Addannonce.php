<?php

namespace App\Livewire;

use App\Models\Annonce;
use App\Models\Image;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Addannonce extends Component
{
    use WithFileUploads;

    public $titre;
    public $description;
    public $categorie;
    public $prix;
    public $images;

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.addannonce');
    }



}
