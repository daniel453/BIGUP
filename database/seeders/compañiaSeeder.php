<?php

namespace Database\Seeders;

use App\Models\compañia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class compañiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        compañia::create([
            'id' => '11',
            'nombre_compania' => 'Marly',
            'num_compania' => '5',
            'cod_batallon' => '37',
            'personal_compania' => '50'
        ]);
        compañia::create([
            'id' => '12',
            'nombre_compania' => 'Consuelo',
            'num_compania' => '4',
            'cod_batallon' => '37',
            'personal_compania' => '50'
        ]);
        compañia::create([
            'id' => '13',
            'nombre_compania' => 'Pradera',
            'num_compania' => '3',
            'cod_batallon' => '37',
            'personal_compania' => '50'
        ]);
        compañia::create([
            'id' => '14',
            'nombre_compania' => 'Socorro',
            'num_compania' => '2',
            'cod_batallon' => '37',
            'personal_compania' => '50'
        ]);
        compañia::create([
            'id' => '15',
            'nombre_compania' => 'Ricaurte',
            'num_compania' => '1',
            'cod_batallon' => '37',
            'personal_compania' => '50'
        ]);
    }
}
