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

         $adminUser=User::factory()->create([
          'email'=> 'admin@example.com',
            'name'=>'Admin',
          'prenom'=>'user',
           'telephone'=>'777520643',
            'password'=>bcrypt('admin123')
          ]);
         $adminRole = Role::create(['name'=>'admin']);
        $adminUser->assignRole($adminRole);
        $adminUser1 =User::factory()->create([
            'email'=> 'elghothvadel@gmail.com',
            'name'=>'elghoth',
            'prenom'=>'vadel',
            'telephone'=>'+221771875242',
            'password'=>bcrypt('12345678')
        ]);





        Annonce::factory()->count(50)->create();






        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
