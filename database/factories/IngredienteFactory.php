<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingrediente>
 */
class IngredienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\es_PE\Restaurant($faker));
        return [
            "nombre"=> $faker->foodName(),
            "descripcion"=> $this->faker->text(10),
            "kcal"=> $this->faker->numberBetween(50,200),
            "proteinas"=>$this->faker->numberBetween(50, 150),
            "grasas"=>$this->faker->numberBetween(50,100),
            "carbohidratos"=>$this->faker->numberBetween(50,100)
        ];
    }
}
