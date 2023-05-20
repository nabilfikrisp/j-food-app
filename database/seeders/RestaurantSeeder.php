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
            'image' => 'Frame69',
            'address' => 'Jl. Sayang',
            'city' => 'Jatinangor',
            'type' => 'Kedai Kopi',
            'phone_number' => '+62' . '8123456789',
            'social_media' => "@" . "makanmudah",
            'rating' => "4.5",
            'price_start' => 30000,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Kafe Kita',
            'image' => 'Frame70',
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
            'image' => 'Frame70',
            'address' => 'Jl. Situ',
            'city' => 'Jatinangor',
            'type' => 'Ayam',
            'phone_number' => '+62' . '8123456789',
            'social_media' => "@" . "crisbar",
            'rating' => "4.1",
            'price_start' => 10000,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Ayam SPG',
            'image' => 'Frame70',
            'address' => 'Jl. Situ',
            'city' => 'Jatinangor',
            'type' => 'Ayam',
            'phone_number' => '+62' . '8123456789',
            'social_media' => "@" . "spg",
            'rating' => "4.1",
            'price_start' => 10000,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Front Space',
            'image' => 'Frame70',
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
