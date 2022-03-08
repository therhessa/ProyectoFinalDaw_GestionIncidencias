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
        Soporte::create([
        	'name' => 'Soporte teléfonico',
        	'proyecto_id' => 1
    	]);
    	Soporte::create([
        	'name' => 'Envío de técnico',
        	'proyecto_id' => 1
    	]);


    	Soporte::create([
        	'name' => 'Soporte teléfonico',
        	'proyecto_id' => 2
    	]);
        Soporte::create([
        	'name' => 'Envío de técnico',
        	'proyecto_id' => 2
    	]);
    }
}
