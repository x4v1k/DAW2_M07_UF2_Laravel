<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los IDs de las películas y actores
        $filmIds = DB::table('films')->pluck('id')->toArray();
        $actorIds = DB::table('actors')->pluck('id')->toArray();

        // Relacionar aleatoriamente entre 1 y 3 actores con al menos 1 película
        foreach ($filmIds as $filmId) {
            $actorsCount = rand(1, 3);
            $selectedActorIds = array_rand($actorIds, $actorsCount);

            foreach ((array)$selectedActorIds as $actorIndex) {
                DB::table('films_actors')->insert([
                    'film_id' => $filmId,
                    'actor_id' => $actorIds[$actorIndex],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
