<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WasteCategory>
 */
class WasteCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => fake()->numberBetween(1, 10),
            'paper' => fake()->numberBetween(1, 0),
            'electronic' => fake()->numberBetween(1, 0),
            'aluminium' => fake()->numberBetween(1, 0),
            'steel' => fake()->numberBetween(1, 0),
            'cardboard' => fake()->numberBetween(1, 0),
            'textiles' => fake()->numberBetween(1, 0),
            'metal' => fake()->numberBetween(1, 0),
            'plastic' => fake()->numberBetween(1, 0),
        ];
    }
}
