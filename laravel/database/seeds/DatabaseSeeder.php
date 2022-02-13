<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ProyectosTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(SoporteTableSeeder::class);
        $this->call(TecnicosTableSeeder::class);
        $this->call(ProyectosUserTableSeeder::class);
        $this->call(IncidenciasTableSeeder::class);



    }
}
