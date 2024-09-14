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
        Schema::create('historico_docentes', function (Blueprint $table) {
            $table->id();
            $table->integer('vacanteID');
            $table->integer('nPersonal')->nullable();
            $table->text('nombreDocente');
            $table->text('tipoAsignacion')->nullable();
            $table->text('fechaAviso')->nullable();
            $table->text('fechaAsignacion')->nullable();
            $table->text('fechaRenuncia')->nullable();
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
        Schema::dropIfExists('historico_docentes');
    }
};
