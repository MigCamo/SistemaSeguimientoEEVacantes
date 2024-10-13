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
        Schema::create('zona__dependencia__programas', function (Blueprint $table) {
            $table->id();
            /* php artisan migrate --path=database\migrations\2022_11_04_224506_create_zona__dependencia__programas_table.php */
            $table->unsignedBigInteger('id_zona') ;
            $table->text('nombre_zona');
            $table->integer('clave_dependencia') ;
            $table->text('nombre_dependencia');
            $table->integer('clave_programa') ;
            $table->text('nombre_programa');

            $table->foreign('id_zona')->references('id')->on('zonas');
            //$table->foreign('clave_dependencia')->references('clave')->on('dependencias');
            //$table->foreign('clave_programa')->references('clave')->on('programas');
            $table->integer('horasIniciales')->nullable();
            $table->integer('horasUtilizadas')->nullable();
            $table->integer('horasDisponibles')->nullable();

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
        Schema::dropIfExists('zona__dependencia__programas');
    }
};
