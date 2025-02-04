<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\WasteCategory;
use App\Models\WasteImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::factory(10)->create();
        WasteCategory::factory(10)->create();
        WasteImages::factory(10)->create();

    }
}
