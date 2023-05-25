<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('favorites')->insert([
            [
                'user_id' => 1,
                'recipe_id' => 1,
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'recipe_id' => 1,
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'recipe_id' => 2,
                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'recipe_id' => 1,
                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'recipe_id' => 2,
                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'recipe_id' => 3,
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'recipe_id' => 1,
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'recipe_id' => 2,
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'recipe_id' => 3,
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'recipe_id' => 4,
                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'recipe_id' => 1,
                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'recipe_id' => 2,
                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'recipe_id' => 3,
                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'recipe_id' => 4,
                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'recipe_id' => 5,
                'created_at' => now(),
            ],
        ]);
    }
}