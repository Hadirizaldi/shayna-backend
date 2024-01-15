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
            'name' => $this->faker->words(nb: 2, asText: true),
            'type' => $this->faker->randomElement(['baju', 'celana', 'tas', 'topi', 'jas', 'kemeja', 'jaket']),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 5, 500),
            'quantity' => $this->faker->numberBetween(1, 500),
        ];
    }
}
