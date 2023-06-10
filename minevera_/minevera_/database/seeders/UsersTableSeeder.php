<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Sara Facal',
                'email' => 'sarafacalboullosa@gmail.com',
                'password' => bcrypt('12345Sara_'),
                'created_at' => now(),
            ],
            [
                'name' => 'Daniel Lopez',
                'email' => 'daniellopez78@gmail.com',
                'password' => bcrypt('12345Dani_'),
                'created_at' => now(),
            ],
            [
                'name' => 'Ivan Illescas',
                'email' => 'ivanillescas89@gmail.com',
                'password' => bcrypt('12345Ivan_'),
                'created_at' => now(),
            ],
            [
                'name' => 'Alba Bernardez',
                'email' => 'albaber90@gmail.com',
                'password' => bcrypt('12345Alba_'),
                'created_at' => now(),
            ],
            [
                'name' => 'Fernando Peleteiro',
                'email' => 'ferpele@gmail.com',
                'password' => bcrypt('12345Fer_'),
                'created_at' => now(),
            ],
        ]);
    }
}