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
    /**
    Tipos de datos que se pueden crear: https://laravel.com/docs/9.x/migrations#creating-columns
    */
    public function up()
    {
        Schema::create('motivos', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroMotivo')->unique();
            $table->text('nombre');
            $table->text('concepto');
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
        Schema::dropIfExists('motivos');
    }
};
