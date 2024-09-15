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
        Schema::create('search_vacantes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_zona');
            $table->integer('clave_dependencia');
            $table->integer('clave_programa');
            $table->string('filtro');
            $table->string('busqueda')->nullable();
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
        Schema::dropIfExists('search_vacantes');
    }
};
