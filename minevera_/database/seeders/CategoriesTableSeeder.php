<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Huevos', //1
            ],
            [
                'name' => 'Vegetariana', //2
            ],
            [
                'name' => 'Pasta', //3
            ],
            [
                'name' => 'Arroz', //4
            ],
            [
                'name' => 'Carne', //5
            ],
            [
                'name' => 'Pescado', //6
            ],
            [
                'name' => 'Guisos', //7
            ],
        ]);
    }
}