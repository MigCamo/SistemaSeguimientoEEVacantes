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
    {/*
        $this->call([
            RegionSeeder::class,
            ReasonSeeder::class,
            SchoolPeriodSeeder::class,
            TypeAsignationSeeder::class,
            DepartamentSeeder::class,
            EducationalExperienceSeeder::class,
            EducationalProgramSeeder::class,
        ]);*/

        \App\Models\User::factory()->create([
            'name' => 'Fernando Elotlan',
            'email' => 'ferelomor@gmail.com',
            'password' => bcrypt('Unshowmas13-'), // Asegúrate de encriptar la contraseña
        ]);
    }
}
