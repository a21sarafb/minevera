<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredients')->insert([
            [
                'name' => 'Patata', //1
            ],
            [
                'name' => 'Cebolla', //2
            ],
            [
                'name' => 'Huevos', //3
            ],
            [
                'name' => 'Berenjena', //4
            ],
            [
                'name' => 'Calabacín', //5
            ],
            [
                'name' => 'Pimiento rojo', //6
            ],
            [
                'name' => 'Ajo', //7
            ],
            [
                'name' => 'Tomate', //8
            ],
            [
                'name' => 'Perejil', //9
            ],
            [
                'name' => 'Tomillo', //10
            ],
            [
                'name' => 'Albahaca', //11
            ],
            [
                'name' => 'Aguja de ternera', //12
            ],
            [
                'name' => 'Zanahoria', //13
            ],
            [
                'name' => 'Vino blanco', //14
            ],
            [
                'name' => 'Arroz alborio', //15
            ],
            [
                'name' => 'Champiñones', //16
            ],
            [
                'name' => 'Caldo de pollo', //17
            ],
            [
                'name' => 'Queso parmesano', //18
            ],
            [
                'name' => 'Carne picada cerdo', //19
            ],
            [
                'name' => 'Bacon', //20
            ],
            [
                'name' => 'Orégano', //21
            ],
            [
                'name' => 'Láminas de lasaña', //22
            ],
            [
                'name' => 'Mantequilla', //23
            ],
            [
                'name' => 'Leche entera', //24
            ],
            [
                'name' => 'Nuez moscada', //25
            ],
            [
                'name' => 'Harina de trigo', //26
            ],
        ]);
    }
}