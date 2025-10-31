<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Note;
use App\Models\Category;
use App\Models\User;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $categories = Category::all()->pluck('id')->toArray();
        $users = User::all()->pluck('id')->toArray();

        // Create 20 notes
        for ($i = 0; $i < 20; $i++) {
            Note::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'category_id' => $faker->randomElement($categories),
                'user_id' => $faker->randomElement($users),
            ]);
        }
    }
}
