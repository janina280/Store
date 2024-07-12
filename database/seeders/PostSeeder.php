<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use InvalidArgumentException;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obține toate categoriile și utilizatorii din baza de date
        $categories = Category::all();
        $users = User::all();

        // Verifică dacă există categorii și utilizatori
        if ($categories->isEmpty()) {
            throw new InvalidArgumentException("There are no categories available to assign posts to.");
        }

        if ($users->isEmpty()) {
            throw new InvalidArgumentException("There are no users available to assign posts to.");
        }

        // Creează 20 de postări și asignează-le categorii și utilizatori
        for ($i = 1; $i <= 20; $i++) {
            Post::create([
                'title' => "Post $i",
                'description' => "This is the body of post $i",
                'category_id' => $categories->random()->id,
                'user_id' => $users->random()->id,
            ]);
        }
    }
}
