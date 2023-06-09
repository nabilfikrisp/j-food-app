<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            'name' => 'Makan Mudah',
            'address' => 'Jl. Sayang',
            'city' => 'Jatinangor',
            'type' => 'Kedai Kopi',
            'phone_number' => '+62' . '8123456789',
            'social_media' => "@" . "makanmudah",
            'rating' => "4.5",
            'price_start' => 10000,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Kafe Kita',
            'address' => 'Jl. Ciseke',
            'city' => 'Jatinangor',
            'type' => 'Kedai Kopi',
            'phone_number' => '+62' . '8123456789',
            'social_media' => "@" . "kafekita",
            'rating' => "4.1",
            'price_start' => 30000,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Crisbar',
            'address' => 'Jl. Situ',
            'city' => 'Jatinangor',
            'type' => 'Ayam',
            'phone_number' => '+62' . '8123456789',
            'social_media' => "@" . "crisbar",
            'rating' => "5.0",
            'price_start' => 10000,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Ayam SPG',
            'address' => 'Jl. Situ',
            'city' => 'Jatinangor',
            'type' => 'Ayam',
            'phone_number' => '+62' . '8123456789',
            'social_media' => "@" . "spg",
            'rating' => "5.0",
            'price_start' => 50000,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Front Space',
            'address' => 'Jl. Situ',
            'city' => 'Jatinangor',
            'type' => 'Kedai Kopi',
            'phone_number' => '+62' . '8123456789',
            'social_media' => "@" . "frontspace",
            'rating' => "4.3",
            'price_start' => 20000,
        ]);
    }
}
