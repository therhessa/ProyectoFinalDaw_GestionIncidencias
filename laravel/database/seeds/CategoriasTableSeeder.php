<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'name' => 'Programa malicioso',
			'proyecto_id' => 1

        ]);
        Categoria::create([
            'name' => 'Pérdida de información personal',
			'proyecto_id' => 1

        ]);
        Categoria::create([
            'name' => 'intrusión',
			'proyecto_id' => 1

        ]);
        Categoria::create([
            'name' => 'problema con el hardware',
			'proyecto_id' => 1

        ]);


        Categoria::create([
            'name' => 'Programa malicioso',
			'proyecto_id' => 2

        ]);
        Categoria::create([
            'name' => 'Pérdida de información personal',
			'proyecto_id' => 2

        ]);
        Categoria::create([
            'name' => 'intrusión',
			'proyecto_id' => 2

        ]);
        Categoria::create([
            'name' => 'problema con el hardware',
			'proyecto_id' => 2

        ]);

    }
}
