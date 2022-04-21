<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Daniel",
            'apellido' => "Rodriguez",
            'cedula' => "1000019890",
            'email' => "daniel1946203@gmail.com",
            'contingente' => "121",
            'password' => bcrypt('1000019890'),
            'rh' => "o+",
            'cod_compañia' => "11",
            'cod_batallon' => "37"
        ])->assignRole("oficial");
        User::create([
            'name' => "Marcos",
            'apellido' => "Gomez",
            'cedula' => "1000063294",
            'email' => "ccgomez492@misena.edu.co",
            'contingente' => "221",
            'password' => bcrypt('1000063294'),
            'rh' => "o+",
            'cod_compañia' => "11",
            'cod_batallon' => "37"
        ])->assignRole("oficial");
    }
}
