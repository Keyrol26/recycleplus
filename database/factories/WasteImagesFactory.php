<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WasteImages>
 */
class WasteImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $index = fake()->numberBetween(0, 2);
        $validation_status = [
            'Valid',
            'Invalid',
            'Processing',
        ];
        return [
            'booking_id' => fake()->numberBetween(1, 10),
            'recycle_image' => '20241113214143.jpeg',
            'validation_status' => $validation_status[$index],
        ];
    }
}
