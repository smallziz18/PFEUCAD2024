<?php

namespace Database\Factories;
use App\Models\Annonce;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class AnnonceFactory extends Factory
{
    protected $model = Annonce::class;

    public function definition(): array
    {
        // sort un utilisateur au hasard depuis la bd
        $randomUserId = DB::table('users')->inRandomOrder()->first()->id;
        return [
            'user_id' =>  $randomUserId,
            'titre' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'prix' => $this->faker->randomFloat(0, 0, 1000),
            'categorie' => $this->faker->word,
            'statu' => $this->faker->boolean,
        ];
    }

    public function configure(): AnnonceFactory
    {
        return $this->afterCreating(function (Annonce $annonce) {
            // Crée plusieurs images associées à cette annonce
            for ($i = 0; $i < random_int(1, 5); $i++) {
                Image::factory()->create([
                    'annonce_id' => $annonce->id,
                ]);
            }
        });
    }

}

