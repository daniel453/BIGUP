<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(roleSeeder::class);
        $this->call(Userseeder::class);
        $this->call(compañiaSeeder::class);
        $this->call(batallonSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
