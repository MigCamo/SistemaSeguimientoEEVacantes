<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Docente;
use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->withPersonalTeam()->create();
         //User::factory(10)->create();
         //Team::factory(10)->create();
         //Docente::factory(count: 10)->create();
/*         \App\Models\User::factory()->create([
             'name' => 'Test User',
            'email' => 'test@example.com',
         ]);*/

        $this->call([
            MotivoSeeder::class,
            ZonaSeeder::class,
            ZonaDependenciaSeeder::class,
            PeriodoSeeder::class,
        ]);

    }
}
