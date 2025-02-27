<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        ////Richiama il seeder
        // $this->call([
        //     PostSeeder::class
        // ]);

        //Controlla se la tabella è vuota  e crea 50 post
        if (Post::count() === 0) {
            Post::factory()->count(50)->create();
        }
    }
}
