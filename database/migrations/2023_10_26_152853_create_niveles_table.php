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
        Schema::create('niveles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('juego_id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->integer('nivel');
            // Otros campos relacionados con el nivel
            $table->timestamps();

            $table->foreign('juego_id')->references('id')->on('juegos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('niveles');
    }
};
