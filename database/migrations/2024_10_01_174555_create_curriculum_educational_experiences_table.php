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
        Schema::create('curriculum_educational_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('ee_code');
            $table->string('curriculum_code') ;
            $table->timestamps();

            $table->foreign('ee_code')->references('code')->on('educational_experiences')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('curriculum_code')->references('code')->on('curriculums')->onDelete('cascade')->onUpdate('cascade');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_educational_experiences');
    }
};
