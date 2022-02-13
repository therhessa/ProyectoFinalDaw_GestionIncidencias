<?php

use Illuminate\Database\Seeder;
use App\User;


class TecnicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Tecnico de soporte
         User::create ([
            'name'=> 'Rocio',
            'email'=> 'tecnico@tecnico.com',
            'password'=> bcrypt('87654321'),
            'role' => "Tecnico"

        ]);
    }
}
