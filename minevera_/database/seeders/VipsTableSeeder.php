<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VipsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vips')->insert([
            [
                'user_id' => 2,
                'date_ini' => '2023-04-29',
                'date_fin' => '2024-04-28',
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'date_ini' => '2023-04-29',
                'date_fin' => '2023-10-28',
                'created_at' => now(),
            ],
        ]);
    }
}