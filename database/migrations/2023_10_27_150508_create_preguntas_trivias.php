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
        Schema::create('preguntasTrivias', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta');
            $table->string('respuestaCorrecta');
            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id')->references('id')->on('niveles');

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
        Schema::dropIfExists('preguntas_trivias');
    }
};
