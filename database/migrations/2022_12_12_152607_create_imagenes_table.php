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
        Schema::create('imagenes', function (Blueprint $table) {

            $table->id();
            $table->string('title',50);
            $table->string('url');
            $table->string('autor');
            $table->string('description',200);
            $table->foreignId('user_id')->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete(); 
            
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
        // Schema::table('contenidos', function (Blueprint $table) {
        //     $table->dropForeign('user_id');
        // });
        Schema::dropIfExists('contenidos');
    }
};
