<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('cognome');
            $table->string('email')->nullable();
            $table->string('residenza')->nullable();
            $table->date('data')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username',20)->unique();
            $table->string('password');
            $table->string('role',10)->default('utente');
            $table->string('occupazione')->nullable();
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
}
