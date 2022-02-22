<?php

use Illuminate\Database\Seeder;
use App\Proyecto;

class ProyectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proyecto::create([
            'name'=> 'Primer proyecto',
            'description'=> 'proyecto jardineria'

        ]);
        Proyecto::create([
            'name'=> 'Segundo proyecto',
            'description'=> 'proyecto ayuntamiento'

        ]);
        Proyecto::create([
            'name'=> 'Tercer proyecto',
            'description'=> 'proyecto web'

        ]);
    }
}
