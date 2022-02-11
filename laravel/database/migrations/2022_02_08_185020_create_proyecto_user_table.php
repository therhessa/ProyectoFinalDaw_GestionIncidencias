<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            //$table->bigInteger('seleccionar_proyecto_id')->unsigned()->nullable();
           // $table->foreign('seleccionar_proyecto_id')->references('id')->on('proyectos');
            $table->bigInteger('soporte_id')->unsigned();
            $table->foreign('soporte_id')->references('id')->on('soportes');
            //$table->rememberToken();
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
        Schema::dropIfExists('proyecto_user');
    }
}
