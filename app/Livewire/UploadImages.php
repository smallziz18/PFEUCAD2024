<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImages extends Component
{
    public $images;
    use WithFileUploads;

    public function create()
    {

    }
    public function render()
    {
        return view('livewire.upload-images');
    }
}
