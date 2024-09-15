<?php

namespace Database\Seeders;

use App\Models\TipoAsignacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoAsignacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipoAsignacion = new TipoAsignacion();
        $tipoAsignacion->tipo = "Art 70";
        $tipoAsignacion->descripcion = "";
        $tipoAsignacion->save();

        $tipoAsignacion1 = new TipoAsignacion();
        $tipoAsignacion1->tipo = "Art 73";
        $tipoAsignacion1->descripcion = "Art 70 y 73";
        $tipoAsignacion1->save();

        $tipoAsignacion2 = new TipoAsignacion();
        $tipoAsignacion2->tipo = "Art 70 y 73";
        $tipoAsignacion2->descripcion = "Art 70 y 73";
        $tipoAsignacion2->save();

        $tipoAsignacion3 = new TipoAsignacion();
        $tipoAsignacion3->tipo = "Convocada";
        $tipoAsignacion3->descripcion = "Convocada";
        $tipoAsignacion3->save();

        $tipoAsignacion4 = new TipoAsignacion();
        $tipoAsignacion4->tipo = "Complemento de carga";
        $tipoAsignacion4->descripcion = "Complemento de carga";
        $tipoAsignacion4->save();

        $tipoAsignacion5 = new TipoAsignacion();
        $tipoAsignacion5->tipo = "Carga obligatoria";
        $tipoAsignacion5->descripcion = "Carga obligatoria";
        $tipoAsignacion5->save();
    }
}
