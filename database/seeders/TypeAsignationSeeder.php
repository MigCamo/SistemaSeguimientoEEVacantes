<?php

namespace Database\Seeders;

use App\Models\TypeAsignation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeAsignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $TypeAsignation = new TypeAsignation();
        $TypeAsignation->type_asignation = "Art 70";
        $TypeAsignation->description = "";
        $TypeAsignation->save();

        $TypeAsignation1 = new TypeAsignation();
        $TypeAsignation1->type_asignation = "Art 73";
        $TypeAsignation1->description = "Art 70 y 73";
        $TypeAsignation1->save();

        $TypeAsignation2 = new TypeAsignation();
        $TypeAsignation2->type_asignation = "Art 70 y 73";
        $TypeAsignation2->description = "Art 70 y 73";
        $TypeAsignation2->save();

        $TypeAsignation3 = new TypeAsignation();
        $TypeAsignation3->type_asignation = "Convocada";
        $TypeAsignation3->description = "Convocada";
        $TypeAsignation3->save();

        $TypeAsignation4 = new TypeAsignation();
        $TypeAsignation4->type_asignation = "Complemento de carga";
        $TypeAsignation4->description = "Complemento de carga";
        $TypeAsignation4->save();

        $TypeAsignation5 = new TypeAsignation();
        $TypeAsignation5->type_asignation = "Carga obligatoria";
        $TypeAsignation5->description = "Carga obligatoria";
        $TypeAsignation5->save();
    }
}
