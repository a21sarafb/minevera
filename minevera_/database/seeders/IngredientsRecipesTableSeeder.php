<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsRecipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredients_recipes')->insert([
            [
                'recipe_id' => 1,
                'ingredient_id' => 1,
                'amount' => '700g',
            ],
            [
                'recipe_id' => 1,
                'ingredient_id' => 2,
                'amount' => '300g',
            ],
            [
                'recipe_id' => 1,
                'ingredient_id' => 3,
                'amount' => '6 unidades',
            ],
            [
                'recipe_id' => 2,
                'ingredient_id' => 4,
                'amount' => '500g',
            ],
            [
                'recipe_id' => 2,
                'ingredient_id' => 5,
                'amount' => '375g',
            ],
            [
                'recipe_id' => 2,
                'ingredient_id' => 2,
                'amount' => '2 unidades',
            ],
            [
                'recipe_id' => 2,
                'ingredient_id' => 6,
                'amount' => '1 unidad',
            ],
            [
                'recipe_id' => 2,
                'ingredient_id' => 7,
                'amount' => '5 dientes',
            ],
            [
                'recipe_id' => 2,
                'ingredient_id' => 8,
                'amount' => '750g',
            ],
            [
                'recipe_id' => 2,
                'ingredient_id' => 9,
                'amount' => 'Al gusto',
            ],
            [
                'recipe_id' => 2,
                'ingredient_id' => 10,
                'amount' => 'Al gusto',
            ],
            [
                'recipe_id' => 2,
                'ingredient_id' => 11,
                'amount' => 'Al gusto',
            ],
            [
                'recipe_id' => 3,
                'ingredient_id' => 12,
                'amount' => '1,5 kg',
            ],
            [
                'recipe_id' => 3,
                'ingredient_id' => 13,
                'amount' => '250g',
            ],
            [
                'recipe_id' => 3,
                'ingredient_id' => 2,
                'amount' => '1 unidad',
            ],
            [
                'recipe_id' => 3,
                'ingredient_id' => 7,
                'amount' => '4 dientes',
            ],
            [
                'recipe_id' => 3,
                'ingredient_id' => 14,
                'amount' => '200 ml',
            ],
            [
                'recipe_id' => 3,
                'ingredient_id' => 1,
                'amount' => '8 unidades',
            ],
            [
                'recipe_id' => 3,
                'ingredient_id' => 10,
                'amount' => 'Al gusto',
            ],
            [
                'recipe_id' => 4,
                'ingredient_id' => 15,
                'amount' => '400g',
            ],
            [
                'recipe_id' => 4,
                'ingredient_id' => 16,
                'amount' => '200g',
            ],
            [
                'recipe_id' => 4,
                'ingredient_id' => 2,
                'amount' => '1 unidad',
            ],
            [
                'recipe_id' => 4,
                'ingredient_id' => 14,
                'amount' => '1/2 vaso',
            ],
            [
                'recipe_id' => 4,
                'ingredient_id' => 17,
                'amount' => '1,5 litros',
            ],
            [
                'recipe_id' => 4,
                'ingredient_id' => 18,
                'amount' => '50g',
            ],
            [
                'recipe_id' => 4,
                'ingredient_id' => 11,
                'amount' => 'Al gusto',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 19,
                'amount' => '500g',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 6,
                'amount' => '2 unidades',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 13,
                'amount' => '2 unidades',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 7,
                'amount' => '2 dientes',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 20,
                'amount' => '150g',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 2,
                'amount' => '2 unidades',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 8,
                'amount' => '250g',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 14,
                'amount' => '250ml',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 21,
                'amount' => '1 cucharita colmada',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 22,
                'amount' => '12 unidades',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 26,
                'amount' => '125g',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 23,
                'amount' => '125g',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 24,
                'amount' => '1 litro',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 25,
                'amount' => 'Una pizca',
            ],
            [
                'recipe_id' => 5,
                'ingredient_id' => 18,
                'amount' => '120g',
            ],
            [
                'recipe_id' => 6,
                'ingredient_id' => 27,
                'amount' => '500g',
            ],
            [
                'recipe_id' => 6,
                'ingredient_id' => 1,
                'amount' => '2 unidades',
            ],
            [
                'recipe_id' => 6,
                'ingredient_id' => 13,
                'amount' => '1 unidad',
            ],
            [
                'recipe_id' => 6,
                'ingredient_id' => 7,
                'amount' => '1 diente',
            ],
            [
                'recipe_id' => 6,
                'ingredient_id' => 6,
                'amount' => '1 unidad',
            ],
            [
                'recipe_id' => 6,
                'ingredient_id' => 28,
                'amount' => '1 unidad',
            ],
            [
                'recipe_id' => 6,
                'ingredient_id' => 14,
                'amount' => '1/2 vaso',
            ],
        ]);
    }
}