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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // Relación con la tabla de usuarios
            $table->string('subscription_status'); // Campo que indica el estado de la suscripción
            $table->timestamp('expires_at')->default(now()->addDays(30)); // Agrega un campo de fecha de vencimiento y establece un valor predeterminado
            // Agrega otros campos relacionados con las suscripciones si es necesario
            $table->double('price')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
};
