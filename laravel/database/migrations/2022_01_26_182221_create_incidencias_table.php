<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->string('severity', 1);
            $table->boolean('active')->default(1);

            
           $table->bigInteger('proyecto_id')->unsigned()->nullable();
           $table->foreign('proyecto_id')->references('id')->on('proyectos');

            $table->bigInteger('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');


            $table->bigInteger('soporte_id')->unsigned()->nullable();
            $table->foreign('soporte_id')->references('id')->on('soportes');
             
            $table->bigInteger('tecnico_id')->unsigned()->nullable();
            $table->foreign('tecnico_id')->references('id')->on('users');
            $table->bigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('users');
           
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
        Schema::dropIfExists('incidencias');
    }
}
