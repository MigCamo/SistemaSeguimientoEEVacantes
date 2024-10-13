<?php

namespace Database\Seeders;

use App\Models\ExperienciaEducativa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienciaEducativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ee1 = new ExperienciaEducativa();
        $ee1->numMateria = 15962;
        $ee1->nrc = 23112;
        $ee1->nombre = "SERVICIO SOCIAL";
        $ee1->horas = 4;
        $ee1->save();

        $ee2 = new ExperienciaEducativa();
        $ee2->numMateria = 23162;
        $ee2->nrc = 77819;
        $ee2->nombre = "SEGURIDAD";
        $ee2->horas = 6;
        $ee2->save();

        $ee3 = new ExperienciaEducativa();
        $ee3->numMateria = 69635;
        $ee3->nrc = 31919;
        $ee3->nombre = "TECNOLOGIAS WEB";
        $ee3->horas = 6;
        $ee3->save();

        $ee4 = new ExperienciaEducativa();
        $ee4->numMateria = 36254;
        $ee4->nrc = 87211;
        $ee4->nombre = "GRAFICACION";
        $ee4->horas = 4;
        $ee4->save();

        $ee5 = new ExperienciaEducativa();
        $ee5->numMateria = 12398;
        $ee5->nrc = 51512;
        $ee5->nombre = "ADMON. SERVIDORES";
        $ee5->horas = 5;
        $ee5->save();

        $ee6 = new ExperienciaEducativa();
        $ee6->numMateria = 96852;
        $ee6->nrc = 32810;
        $ee6->nombre = "BASES DE DATOS";
        $ee6->horas = 6;
        $ee6->save();
    }
}
