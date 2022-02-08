<?php

use App\Soporte;
use Illuminate\Database\Seeder;

class SoporteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Soporte::create([ // 1
        	'name' => 'Atención por teléfono',
        	'proyecto_id' => 1
    	]);
    	Soporte::create([ // 2
        	'name' => 'Envío de técnico',
        	'proyecto_id' => 1
    	]);

    	
    	Soporte::create([ // 3
        	'name' => 'Consulta especializada',
        	'proyecto_id' => 2
    	]);
    }
}
