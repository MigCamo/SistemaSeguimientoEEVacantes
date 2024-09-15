<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Zona;

class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $zona1 = new Zona();
        $zona1->nombre = "Xalapa";
        $zona1->save();

        $zona2 = new Zona();
        $zona2->nombre = "Veracruz";
        $zona2->save();

        $zona3 = new Zona();
        $zona3->nombre = "Orizaba-Cordoba";
        $zona3->save();

        $zona4 = new Zona();
        $zona4->nombre = "Poza Rica-Tuxpan";
        $zona4->save();

        $zona5 = new Zona();
        $zona5->nombre = "Coatzacoalcos-Minatitlan";
        $zona5->save();

    }
}
