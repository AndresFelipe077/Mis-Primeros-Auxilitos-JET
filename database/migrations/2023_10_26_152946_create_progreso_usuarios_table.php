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
        Schema::create('progresoUsuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('juego_id');
            $table->unsignedBigInteger('nivel_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('juego_id')->references('id')->on('juegos');
            $table->foreign('nivel_id')->references('id')->on('niveles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('progreso_usuarios');
    }
};
