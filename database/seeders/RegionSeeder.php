<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Region1 = new Region();
        $Region1->code = "1";
        $Region1->name = "Xalapa";
        $Region1->save();

        $Region2 = new Region();
        $Region2->code = "2";
        $Region2->name = "Veracruz";
        $Region2->save();

        $Region3 = new Region();
        $Region3->code = "3";
        $Region3->name = "Orizaba-Cordoba";
        $Region3->save();

        $Region4 = new Region();
        $Region4->code = "4";
        $Region4->name = "Poza Rica-Tuxpan";
        $Region4->save();

        $Region5 = new Region();
        $Region5->code = "5";
        $Region5->name = "Coatzacoalcos-Minatitlan";
        $Region5->save();

    }
}
