<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            IngredientesSeeder::class,
            RecetasSeeder::class,
            UserSeeder::class,
            RecetasIngredientesSeeder::class,
            MenuDiarioGeneralSeeder::class,
            RecetasMenuDiarioSeeder::class
        ]);
    }
}
