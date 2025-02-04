<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Superadmins;
use App\Models\Admins;
use App\Models\Clients;
use App\Models\UserProfile;
use App\Models\Collector;
use Illuminate\Support\Str;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            $pass = 'pass';
            $users = [
                [
                    'name' => 'SuperAdmin',
                    'email' => 'superadmin@demo.com',
                    'role' => 0,
                    'password' => bcrypt($pass),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ],
                [
                    'name' => 'Admin',
                    'email' => 'admin@demo.com',
                    'role' => 1,
                    'password' => bcrypt($pass),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ],
                [
                    'name' => 'User',
                    'email' => 'user@demo.com',
                    'role' => 2,
                    'password' => bcrypt($pass),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ],
                [
                    'name' => 'Collector',
                    'email' => 'collector@demo.com',
                    'role' => 3,
                    'password' => bcrypt($pass),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ],
                [
                    'name' => 'Manikavasagam a/l Sittampalam',
                    'email' => 'mani@demo.com',
                    'role' => 2,
                    'password' => bcrypt($pass),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ],
                [
                    'name' => 'Manoharan a/l Samy',
                    'email' => 'mano2@demo.com',
                    'role' => 2,
                    'password' => bcrypt($pass),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ],


            ];
            foreach ($users as $userData) {
                $user = User::create($userData);
                UserProfile::create(['user_id' => $user->id]);
                // Create associated role-specific record
                if ($user->role == '2') {
                    Clients::create(['user_id' => $user->id]);
                } elseif ($user->role == '0') {
                    Superadmins::create(['user_id' => $user->id]);
                } elseif ($user->role == '1') {
                    Admins::create(['user_id' => $user->id]);
                } elseif ($user->role == '3') {
                    Collector::create(['user_id' => $user->id]);
                }
            }
            ;

        }
    }
}
