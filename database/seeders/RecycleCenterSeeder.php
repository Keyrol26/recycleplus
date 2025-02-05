<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecycleCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your SQL file
        $sqlFile = 'recycle_centers.sql';

        // Read and execute the SQL file
        DB::unprepared(File::get($sqlFile));

        echo "Recycle Centers imported successfully!";
    }
}
