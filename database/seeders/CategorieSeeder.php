<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Create 5 categories
        for ($i = 0; $i < 5; $i++) {
            Categorie::create([
                'name' => $faker->word,
            ]);
        }
    }
}
   