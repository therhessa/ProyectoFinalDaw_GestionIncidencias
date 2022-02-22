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
            'name' => 'Categoría A1',
			'proyecto_id' => 1

        ]);
        Categoria::create([
            'name' => 'Categoría A2',
			'proyecto_id' => 1

        ]);
        Categoria::create([
            'name' => 'Categoría B1',
			'proyecto_id' => 2

        ]);
        Categoria::create([
            'name' => 'Categoría B2',
			'proyecto_id' => 2

        ]);
        
    }
}
