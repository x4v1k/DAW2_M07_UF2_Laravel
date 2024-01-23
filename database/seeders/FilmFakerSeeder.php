<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usar el paquete Faker para generar datos ficticios
        $faker = Faker::create();

        // Informar 10 películas en la tabla 'films'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('films')->insert([
                'name' => $faker->sentence(3),
                'year' => $faker->numberBetween(1900, date('Y')),
                'genre' => $faker->word,
                'country' => $faker->country,
                'duration' => $faker->randomFloat(2, 60, 180), // Duración entre 60 y 180 minutos
                'img_url' => $faker->imageUrl(640, 480),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
