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
        Schema::create('curriculums', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->integer('year');
            $table->string('educational_programs_code');
            $table->string('type');
            $table->boolean('active');
            $table->integer('numberPeriods');
            $table->integer('minimumCredits');
            $table->timestamps();

            $table->foreign('educational_programs_code')->references('program_code')->on('educational_programs')->onDelete('cascade')->onUpdate('cascade');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculums');
    }
};
