<?php

namespace Database\Factories;

use App\Models\Annonce;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnnonceImage>
 */
class AnnonceImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'annonce_id' => Annonce::all()->random()->id,
            'image_id' => Image::all()->random()->id,
        ];
    }
}
