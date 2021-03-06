<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //creamos la tablas
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('Cliente');
            $table->integer('seleccionar_proyecto_id')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();//eliminar usuarios
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //elimina la tabla
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
