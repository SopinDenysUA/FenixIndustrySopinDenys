<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(1, true),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 10, 2000),
            'image' => 'images/' . $this->faker->word() . '.jpg',
        ];
    }
}
