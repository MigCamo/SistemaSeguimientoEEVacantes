<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $periodo1 = new Periodo();
        $periodo1->nPeriodo = "2";
        $periodo1->clavePeriodo = "202351";
        $periodo1->descripcion =  "01 AGO. 2022 AL 31 ENE. 2023";
        $periodo1->actual = true;
        $periodo1->save();

    }
}
