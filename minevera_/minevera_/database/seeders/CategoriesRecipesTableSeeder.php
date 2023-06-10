<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesRecipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories_recipes')->insert([
            [
                'recipe_id' => 1,
                'category_id' => 1,
            ],
            [
                'recipe_id' => 1,
                'category_id' => 2,
            ],
            [
                'recipe_id' => 2,
                'category_id' => 2,
            ],
            [
                'recipe_id' => 3,
                'category_id' => 5,
            ],
            [
                'recipe_id' => 3,
                'category_id' => 7,
            ],
            [
                'recipe_id' => 4,
                'category_id' => 2,
            ],
            [
                'recipe_id' => 4,
                'category_id' => 4,
            ],
            [
                'recipe_id' => 5,
                'category_id' => 3,
            ],
            [
                'recipe_id' => 5,
                'category_id' => 5,
            ],
            [
                'recipe_id' => 6,
                'category_id' => 6,
            ],
        ]);
    }
}