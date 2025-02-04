<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Collector;
use App\Models\UserProfile;
use App\Models\User;
use App\Models\Superadmins;
use App\Models\Clients;
use App\Models\Admins;
use Faker\Factory as Faker;

class CollectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 10 doctor
        for ($i = 0; $i < 5; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'role' => 3,
                'password' => bcrypt('pass'),
                'email_verified_at' => now(),
            ]);
            UserProfile::create([
                'user_id' => $user->id,
                'phoneno' => '01' . $faker->numerify('########'), // Generates a phone number starting with '01' and a max of 10 digits
                'dob' => $faker->dateTimeBetween('-100 years', '-13 years')->format('Y-m-d'), // Generates a date before today, at least 18 years old
            ]);
            Collector::create(['user_id' => $user->id]);
        }
    }
}
