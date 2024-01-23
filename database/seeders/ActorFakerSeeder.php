<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usar el paquete Faker para generar datos ficticios
        $faker = Faker::create();

        // Informar 10 actores en la tabla 'actors'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('actors')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'birthdate' => $faker->date,
                'country' => $faker->country,
                'img_url' => $faker->imageUrl(640, 480),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
