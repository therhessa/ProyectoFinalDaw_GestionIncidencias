<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Admin
         User::create ([
            'name'=> 'tere',
            'email'=> 'admin@admin.com',
            'password'=> bcrypt('12345678'),
            'role' => 0

        ]);
         //Tecnico de soporte
         User::create ([
            'name'=> 'Rocio',
            'email'=> 'tecnico@tecnico.com',
            'password'=> bcrypt('87654321'),
            'role' => 1

        ]);
         // Cliente
         User::create([
        	'name' => 'Juan',
        	'email' => 'juan@cliente.com',
        	'password' => bcrypt('11111111'),
        	'role' => 2
        ]);
    }
}
