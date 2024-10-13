<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departament;
use App\Models\Regions_Departaments;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Región Xalapa (Zona 1)
        /*ament = new Departament();
        $departament->code = "1";
        $departament->name = "DIRECCIÓN GENERAL DEL ÁREA ACADÉMICA ECONÓMICO ADMINISTRATIVA";
        $departament->save();

        $regionDepartament = new Regions_Departaments();
        $regionDepartament->region_code = "1";
        $regionDepartament->departament_code = "1";
        $regionDepartament->save();
        */

        $departament1 = new Departament();
        $departament1->code = "11301";
        $departament1->name = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $departament1->save();

        $regionDepartament1 = new Regions_Departaments();
        $regionDepartament1->region_code = "1";
        $regionDepartament1->departament_code = "11301";
        $regionDepartament1->save();

        $departament2 = new Departament();
        $departament2->code = "11303";
        $departament2->name = "FACULTAD DE ECONOMÍA";
        $departament2->save();

        $regionDepartament2 = new Regions_Departaments();
        $regionDepartament2->region_code = "1";
        $regionDepartament2->departament_code = "11303";
        $regionDepartament2->save();

        $departament3 = new Departament();
        $departament3->code = "11304";
        $departament3->name = "FACULTAD DE ESTADÍSTICA E INFORMÁTICA";
        $departament3->save();

        $regionDepartament3 = new Regions_Departaments();
        $regionDepartament3->region_code = "1";
        $regionDepartament3->departament_code = "11304";
        $regionDepartament3->save();

        $departament4 = new Departament();
        $departament4->code = "11309";
        $departament4->name = "FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES";
        $departament4->save();

        $regionDepartament4 = new Regions_Departaments();
        $regionDepartament4->region_code = "1";
        $regionDepartament4->departament_code = "11309";
        $regionDepartament4->save();

        $departament5 = new Departament();
        $departament5->code = "11701";
        $departament5->name = "DIRECCIÓN GENERAL DEL SISTEMA DE ENSEÑANZA ABIERTA";
        $departament5->save();

        $regionDepartament5 = new Regions_Departaments();
        $regionDepartament5->region_code = "1";
        $regionDepartament5->departament_code = "11701";
        $regionDepartament5->save();

        // Región Veracruz (Zona 2)
        $departament6 = new Departament();
        $departament6->code = "21301";
        $departament6->name = "FACULTAD DE ADMINISTRACIÓN";
        $departament6->save();

        $regionDepartament6 = new Regions_Departaments();
        $regionDepartament6->region_code = "2";
        $regionDepartament6->departament_code = "21301";
        $regionDepartament6->save();

        $departament7 = new Departament();
        $departament7->code = "22302";
        $departament7->name = "FACULTAD DE CONTADURÍA Y NEGOCIOS";
        $departament7->save();

        $regionDepartament7 = new Regions_Departaments();
        $regionDepartament7->region_code = "2";
        $regionDepartament7->departament_code = "22302";
        $regionDepartament7->save();

        $departament8 = new Departament();
        $departament8->code = "22701";
        $departament8->name = "COORDINACIÓN ACADÉMICA REGIONAL DE ENSEÑANZA ABIERTA";
        $departament8->save();

        $regionDepartament8 = new Regions_Departaments();
        $regionDepartament8->region_code = "2";
        $regionDepartament8->departament_code = "22701";
        $regionDepartament8->save();

        // Región Orizaba-Córdoba (Zona 3)
        $departament9 = new Departament();
        $departament9->code = "31701";
        $departament9->name = "COORDINACIÓN ACADÉMICA REGIONAL DE ENSEÑANZA ABIERTA";
        $departament9->save();

        $regionDepartament9 = new Regions_Departaments();
        $regionDepartament9->region_code = "3";
        $regionDepartament9->departament_code = "31701";
        $regionDepartament9->save();

        $departament10 = new Departament();
        $departament10->code = "34301";
        $departament10->name = "FACULTAD DE NEGOCIOS Y TECNOLOGÍAS";
        $departament10->save();

        $regionDepartament10 = new Regions_Departaments();
        $regionDepartament10->region_code = "3";
        $regionDepartament10->departament_code = "34301";
        $regionDepartament10->save();

        // Región Poza Rica-Tuxpan (Zona 4)
        $departament11 = new Departament();
        $departament11->code = "41701";
        $departament11->name = "COORDINACIÓN ACADÉMICA REGIONAL DE ENSEÑANZA ABIERTA";
        $departament11->save();

        $regionDepartament11 = new Regions_Departaments();
        $regionDepartament11->region_code = "4";
        $regionDepartament11->departament_code = "41701";
        $regionDepartament11->save();

        $departament12 = new Departament();
        $departament12->code = "42301";
        $departament12->name = "FACULTAD DE CONTADURÍA";
        $departament12->save();

        $regionDepartament12 = new Regions_Departaments();
        $regionDepartament12->region_code = "4";
        $regionDepartament12->departament_code ="42301";
        $regionDepartament12->save();

        // Región Coatzacoalcos-Minatitlán (Zona 5)
        $departament13 = new Departament();
        $departament13->code = "51301";
        $departament13->name = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $departament13->save();

        $regionDepartament13 = new Regions_Departaments();
        $regionDepartament13->region_code = "5";
        $regionDepartament13->departament_code = "51301";
        $regionDepartament13->save();

        $departament14 = new Departament();
        $departament14->code = "51701";
        $departament14->name = "COORDINACIÓN ACADÉMICA REGIONAL DE ENSEÑANZA ABIERTA";
        $departament14->save();

        $regionDepartament14 = new Regions_Departaments();
        $regionDepartament14->region_code = "5";
        $regionDepartament14->departament_code = "51701";
        $regionDepartament14->save();
    }
}
