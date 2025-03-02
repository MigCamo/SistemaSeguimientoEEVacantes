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
        Schema::create('educational_experience_vacancies', function (Blueprint $table) {
            $table->string('nrc')->primary();
            $table->integer('school_period_code');
            $table->string('region_code');
            $table->string('departament_code');
            $table->string('area_code');
            $table->string('educational_program_code');
            $table->string('educational_experience_code');// Asegúrate de que solo se declare una vez
            $table->string('class');
            $table->string('subGroup');
            $table->string('numPlaza', 10)->nullable();
            $table->integer('reason_code');
            $table->string('academic');
            $table->binary('content')->nullable();
            $table->timestamps();

            $table->foreign('school_period_code')->references('code')->on('school_periods')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('region_code')->references('code')->on('regions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('departament_code')->references('code')->on('departaments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('educational_program_code')->references('program_code')->on('educational_programs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('educational_experience_code')->references('code')->on('educational_experiences')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reason_code')->references('code')->on('reasons')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educational_experience_vacancies');
    }
};
