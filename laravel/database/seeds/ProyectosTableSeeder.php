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
            'name'=> 'Proyecto A',
            'description'=> 'proyecto jardineria'

        ]);
        Proyecto::create([
            'name'=> 'Proyecto B',
            'description'=> 'proyecto ayuntamiento'

        ]);

    }
}
