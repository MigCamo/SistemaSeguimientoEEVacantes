<?php

namespace Database\Seeders;

use App\Models\EducationalExperience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationalExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ee1 = new EducationalExperience();
        $ee1->code = "15962";
        $ee1->name = "SERVICIO SOCIAL";
        $ee1->hours = 4;
        $ee1->save();

        $ee2 = new EducationalExperience();
        $ee2->code = "23162";
        $ee2->name = "SEGURIDAD";
        $ee2->hours = 6;
        $ee2->save();

        $ee3 = new EducationalExperience();
        $ee3->code = "69635";
        $ee3->name = "TECNOLOGIAS WEB";
        $ee3->hours = 6;
        $ee3->save();

        $ee4 = new EducationalExperience();
        $ee4->code = "36254";
        $ee4->name = "GRAFICACION";
        $ee4->hours = 4;
        $ee4->save();

        $ee5 = new EducationalExperience();
        $ee5->code = "12398";
        $ee5->name = "ADMON. SERVIDORES";
        $ee5->hours = 5;
        $ee5->save();

        $ee6 = new EducationalExperience();
        $ee6->code = "96852";
        $ee6->name = "BASES DE DATOS";
        $ee6->hours = 6;
        $ee6->save();
    }
}
