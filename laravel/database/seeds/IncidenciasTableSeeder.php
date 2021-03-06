<?php

use App\Incidencia;
use Illuminate\Database\Seeder;

class IncidenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incidencia::create([
        	'title' => 'Primera incidencia',
        	'description' => 'Lo que ocurre es que se encontró un problema en la página y esta se cerró.',
        	'severity' => 'N',

        	'categoria_id' => 2,
        	'proyecto_id' => 1,
        	'soporte_id' => 2,

        	'cliente_id' => 2,
        	'tecnico_id' => 3
    	]);
        Incidencia::create([
        	'title' => 'Segunda incidencia',
        	'description' => 'Existe una pérdida de informacion personal',
        	'severity' => 'A',

        	'categoria_id' => 2,
        	'proyecto_id' => 2,
        	'soporte_id' => 1,

        	'cliente_id' => 1,
        	'tecnico_id' => 3
    	]);

    }
}
