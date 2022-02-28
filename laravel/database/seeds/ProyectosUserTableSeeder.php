<?php

use Illuminate\Database\Seeder;
use App\ProyectoUser;
class ProyectosUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProyectoUser::create([
        	'proyecto_id' => 1,
        	'user_id' => 3,
        	'soporte_id' => 1
		]);
        ProyectoUser::create([
        	'proyecto_id' => 1,
        	'user_id' => 1,
        	'soporte_id' => 2
		]);
    }

}
