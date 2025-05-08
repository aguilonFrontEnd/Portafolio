<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
           
            [
                'nombre' => 'Gorras',
                'descripcion' => 'Categoría para diferentes tipos de gorras.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camisetas',
                'descripcion' => 'Categoría para diferentes tipos de camisetas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Chaquetas',
                'descripcion' => 'Categoría para diferentes tipos de chaquetas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pantalones',
                'descripcion' => 'Categoría para diferentes tipos de pantalones.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Zapatos',
                'descripcion' => 'Categoría para diferentes tipos de zapatos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Zapatillas',
                'descripcion' => 'Categoría para diferentes tipos de zapatillas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pantalones Cortos',
                'descripcion' => 'Categoría para diferentes tipos de pantalones cortes.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camisilla',
                'descripcion' => 'Categoría para diferentes tipos de pantalones camisillas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nombre' => 'Outlet',
                'descripcion' => 'Categoría de prendas y accesorios en oferta o liquidación.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
