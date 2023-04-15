<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use App\Models\Receta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecetasIngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recetas = Receta::all();
        Ingrediente::all()->each(function($ingrediente) use ($recetas){
            $ingrediente->recetas()->attach(
                $recetas->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
