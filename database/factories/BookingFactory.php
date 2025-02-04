<?php

namespace Database\Factories;

use Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $index = fake()->numberBetween(0, 4);

        $status = [
            'Rejected',
            'Accepted',
            'Completed',
            'Processing',
            'Pending',
        ];

        $iweight = fake()->numberBetween(0, 5); // Adjusted to ensure it's within the bounds of the weight array
        $weight = [
            'Less than 1',
            '2',
            '3',
            '4',
            '5',
            'More than 5',
        ];

        $itime = fake()->numberBetween(0, 18); // Adjusted to ensure it's within the bounds of the time array
        $time = [
            "09.00 AM",
            "09.30 AM",
            "10.00 AM",
            "10.30 AM",
            "11.00 AM",
            "11.30 AM",
            "12.00 PM",
            "12.30 PM",
            "01.00 PM",
            "01.30 PM",
            "02.00 PM",
            "02.30 PM",
            "03.00 PM",
            "03.30 PM",
            "04.00 PM",
            "04.30 PM",
            "05.00 PM",
            "05.30 PM",
            "06.00 PM",
        ];

        return [
            'client_id' => fake()->numberBetween(4, 13),  // Removed unique constraint for client_id
            'address_id' => fake()->numberBetween(1, 10),  // Removed unique constraint for address_id
            'pickup_id' => 'PK-' . now()->format('Ymd') . '-' . Str::padLeft(fake()->numberBetween(1, 10000), 5, '0'), // Removed unique
            'name' => fake()->name(),
            'status' => $status[$index],
            'phoneno' => '01' . fake()->numerify('########'),
            'alt_phoneno' => '01' . fake()->numerify('########'),
            'est_weight' => $weight[$iweight],
            'note' => fake()->text(50),
            'pickup_date' => fake()->dateTimeBetween('first day of this month', 'last day of this month')->format('Y-m-d'),
            'pickup_time' => $time[$itime],
        ];
    }
}
