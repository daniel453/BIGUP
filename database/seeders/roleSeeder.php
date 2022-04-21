<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = Role::create(['name' => 'soldado']);
        $rol2 = Role::create(['name' => 'sub-oficial']);
        $rol3 = Role::create(['name' => 'oficial']);

        Permission::create(['name' => 'consultar_info'])->syncRoles([$rol2,$rol3]);
        Permission::create(['name' => 't_vigilancia'])->syncRoles([$rol2,$rol3]);
        Permission::create(['name' => 'bitacora'])->syncRoles([$rol2,$rol3]);
        Permission::create(['name' => 'crear_usuario'])->assignRole($rol3);
        Permission::create(['name' => 'soldadoTurno'])->assignRole($rol1);
    }
}
