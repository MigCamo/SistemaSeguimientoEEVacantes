<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'creator_id' => 1, // Relacionado al usuario administrador
            'name' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}