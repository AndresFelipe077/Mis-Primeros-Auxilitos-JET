<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile_photo_path', 2048) -> nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')     -> nullable();
            $table->string('genero')                   -> nullable();
            $table->date('fechaNacimiento')            -> nullable();
            $table->string('password', 20);
            $table->string('description', 250)         -> nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
// $table->boolean('cancion') -> default(1) -> nullable();