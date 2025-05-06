<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamamos a los seeders de Roles y Categorías
        $this->call([
            RolesSeeder::class, 
            CategoriasSeeder::class,
        ]);
    }
}
