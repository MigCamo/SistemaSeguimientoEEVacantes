<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions_educational_programs', function (Blueprint $table) {
            $table->id();
            $table->string('region_code');
            $table->string('departament_code') ;
            $table->string('educational_program_code');
            $table->timestamps();

            $table->foreign('region_code')->references('code')->on('regions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('departament_code')->references('code')->on('departaments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('educational_program_code')->references('program_code')->on('educational_programs')->onDelete('cascade')->onUpdate('cascade');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions_educational_programs');
    }
};
