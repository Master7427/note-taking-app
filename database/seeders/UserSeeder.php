<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $user = new User;
            $user->name = $faker->lastName;
            $user->email = $faker->unique()->email;
            $user->password = bcrypt('123456');
            $user->save();
        }
    }
}
