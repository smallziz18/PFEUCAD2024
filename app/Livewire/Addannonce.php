<?php

namespace App\Livewire;

use App\Models\Annonce;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;

use Illuminate\Contracts\View\View;


class Addannonce extends Component implements HasForms
{
    use InteractsWithForms;
    public $titre;
    public $categorie;
    public $description;
    public $prix;
    public $url_image;

    public function mount(): void
    {
        $this->form->fill();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                TextInput::make('titre')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                TextInput::make('prix')
                    ->required()
                    ->numeric(),
                TextInput::make('categorie')
                    ->required()
                    ->maxLength(255),

            ])
        ->statePath('data')
        ->model(Annonce::class);

    }
    public function create(): void
    {
        dd($this->form->getState());
    }
    public function render()
    {
        return view('livewire.addannonce');
    }
}
