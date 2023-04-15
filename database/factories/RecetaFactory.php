<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receta>
 */
class RecetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre"=> $this->faker->word(),
            "descripcion"=> $this->faker->text(10),
            "elaboracion"=> $this->faker->text(20),
            // "kcal"=> $this->faker->numberBetween(50,200)
        ];
    }
}
