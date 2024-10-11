<?php

namespace Database\Seeders;

use App\Models\SchoolPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodo1 = new SchoolPeriod();
        $periodo1->period_number = "2";
        $periodo1->code = "202351";
        $periodo1->description =  "01 AGO. 2022 AL 31 ENE. 2023";
        $periodo1->current = true;
        $periodo1->save();
    }
}
