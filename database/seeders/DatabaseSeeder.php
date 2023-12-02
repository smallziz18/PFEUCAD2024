<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Annonce;
use App\Models\Image;
use App\Models\User;
use Database\Factories\AnnonceFactory;
use Database\Factories\AnnonceImageFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws \Exception
     */
    public function run(): void
    {
        /*
         $adminUser=User::factory()->create([
          'email'=> 'admin@example.com',
            'name'=>'Admin',
          'prenom'=>'user',
           'telephone'=>'777520643',
            'password'=>bcrypt('admin123')
          ]);
         $adminRole = Role::create(['name'=>'admin']);
        $adminUser->assignRole($adminRole);
        */
        Image::factory(10)->create();
        Annonce::factory(10)->create();
        $annonces = Annonce::factory(10)->create();

        // Créer 20 images
        $images = Image::factory(10)->create();
        $annonces->each(function ($annonce) use ($images) {
            // Prendre des images aléatoires
            $randomImages = $images->random(random_int(1, 5));

            // Attacher ces images à l'annonce actuelle
            $annonce->images()->attach($randomImages);
        });



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
