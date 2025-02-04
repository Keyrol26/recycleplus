<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Collector;
use App\Models\UserProfile;
use App\Models\User;
use App\Models\Superadmins;
use App\Models\Clients;
use App\Models\Address;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $realAddresses = [
            ['street' => '60, Jalan Belalang 20/7, Seksyen 20','postal_code' => '40300'],
            ['street' => '24, Jalan Krisoberil 7/20, Seksyen 7',  'postal_code' => '40000'],
            ['street' => '45, Jalan Tarif 23/8, Seksyen 23',  'postal_code' => '40000'],
            ['street' => '26, Jalan Rotan Air 18/20, Seksyen 18',  'postal_code' => '40000'],
            ['street' => '9, Jalan Ferum 7/31, Seksyen 7', 'postal_code' => '40000'],
            ['street' => '15, Jalan Vanadium 7/34, Seksyen 7','postal_code' => '40000'],
            ['street' => '18, Jalan Telok Belanga 10/1, Seksyen 10', 'postal_code' => '40000'],
            ['street' => '10, Jalan Polo Air 13/59, Seksyen 13',  'postal_code' => '40000'],
            ['street' => '21, Jalan Polo Air 13/58b, Seksyen 13', 'postal_code' => '40000'],
            ['street' => '5, Jalan Mesra 7, Hicom-glenmarie Industrial Park','postal_code' => '40150'],
        ];

        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'role' => 2,
                'password' => bcrypt('pass'),
                'email_verified_at' => now(),
            ]);
            UserProfile::create([
                'user_id' => $user->id,
                'phoneno' => '01' . $faker->numerify('########'), // Generates a phone number starting with '01' and a max of 10 digits
                'dob' => $faker->dateTimeBetween('-100 years', '-13 years')->format('Y-m-d'), // Generates a date before today, at least 18 years old
            ]);
            $addressData = $realAddresses[$i % count($realAddresses)];
            Address::create([
                'user_id' => $user->id,
                'address_type' => 'Home',
                'street' => $addressData['street'],
                'city' => 'SHAH ALAM',
                'postal_code' => $addressData['postal_code'],
                'state' => 'SELANGOR',
                'country' => 'MALAYSIA',
            ]);
            Clients::create(['user_id' => $user->id]);
        }
    }
}
