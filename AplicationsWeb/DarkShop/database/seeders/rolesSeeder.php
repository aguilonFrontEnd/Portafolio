<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'nombre_rol' => 'Vendedor',
                'descripcion' => 'Rol que vende las prendas a los compradores en la plataforma',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_rol' => 'Comprador',
                'descripcion' => 'Rol que compra las prendas a los vendedores en la plataforma',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

