<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Score;

class ScoresSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Let's truncate our existing records to start from scratch.
        Score::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Score::create([
                'word' => $faker->word(),
                'score' => $faker->randomNumber(2),
                'user_id' => $faker->randomNumber(2),
            ]);
        }
    }
}
