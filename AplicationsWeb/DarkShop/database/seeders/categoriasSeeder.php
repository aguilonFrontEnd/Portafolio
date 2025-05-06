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
                'nombre' => 'Zapatos',
                'descripcion' => 'Categoría para diferentes tipos de zapatos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camisillas',
                'descripcion' => 'Categoría para camisillas y prendas similares.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camisetas',
                'descripcion' => 'Categoría para camisetas de todo tipo.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pantalones',
                'descripcion' => 'Categoría para pantalones, jeans, leggings, etc.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Outlet',
                'descripcion' => 'Categoría de prendas y accesorios en oferta o liquidación.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Chaquetas',
                'descripcion' => 'Categoría para chaquetas, abrigos y prendas exteriores.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Conjuntos',
                'descripcion' => 'Categoría para conjuntos de ropa combinados.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Zapatillas',
                'descripcion' => 'Categoría para zapatillas deportivas y casuales.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
