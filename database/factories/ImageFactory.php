<?php

namespace Database\Factories;

use App\Models\Annonce;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {




        return [

            'user_id' => User::all()->random()->id,

            'url_image' => $this->faker->imageUrl(), // Génération aléatoire de l'URL de l'image
        ];
    }
}
