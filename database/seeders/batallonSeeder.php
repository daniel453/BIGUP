<?php

namespace Database\Seeders;

use App\Models\batallon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class batallonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        batallon::create([
            'id' => '37',
            'nombre_batallon' => 'Batallon guardia presidencial',
            'num_batallon' => '37',
            'ubicacion' => 'CRA 9#6C 28',
        ]);
    }
}
