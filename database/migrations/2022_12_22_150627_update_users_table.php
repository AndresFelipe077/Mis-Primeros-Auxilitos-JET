<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration//return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table -> string('avatar', 500)    -> nullable();
            $table -> string('external_id')    -> nullable();
            $table -> string('external_auth')  -> nullable();
            $table -> string('password')       -> nullable() -> change();
            // $table -> text ('socialite2fa_secret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
