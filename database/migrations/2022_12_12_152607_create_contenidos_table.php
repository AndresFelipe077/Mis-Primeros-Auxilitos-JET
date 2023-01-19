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
        Schema::create('contenidos', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->string('url');
            $table->string('autor');
            $table->string('description',200);
            $table->foreignId('user_id')
                ->nullable()
                ->cascadeOnUpdate('set null')
                ->cascadeOnDelete('set null')
                ->nullOnDelete('set null')
                ->constrained('users');
            
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
        Schema::dropIfExists('contenidos');
    }
};
