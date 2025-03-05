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
        Schema::create('educational_programs', function (Blueprint $table) {
            $table->string('program_code')->primary();
            $table->string('name');
            $table->integer('initialhours')->nullable();
            $table->integer('usedhours')->nullable();
            $table->integer('availablehours')->nullable();
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
        Schema::dropIfExists('educational_programs');
    }
};
