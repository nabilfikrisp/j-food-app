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
            'price_start' => 30000,
        ]);
    }
}
