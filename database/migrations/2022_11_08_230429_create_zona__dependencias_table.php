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
        Schema::create('zona__dependencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_zona') ;
            $table->text('nombre_zona');
            $table->integer('clave_dependencia')->unique();
            $table->text('nombre_dependencia');

            $table->foreign('id_zona')->references('id')->on('zonas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zona__dependencias');
    }
};
