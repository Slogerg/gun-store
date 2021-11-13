<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'caliber' => $this->faker->name,
            'bullets' => $this->faker->name,
            'category_id' => 1,
            'price' => $this->faker->numberBetween(1,1000),
        ];
    }
}
