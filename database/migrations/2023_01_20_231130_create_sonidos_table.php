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
        Schema::create('sonidos', function (Blueprint $table) {
            $table->double('cancion', true);
            $table->foreignId('user_id')
                ->nullable()
                ->cascadeOnUpdate('set null')
                ->cascadeOnDelete('set null')
                ->nullOnDelete('set null')
                ->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
