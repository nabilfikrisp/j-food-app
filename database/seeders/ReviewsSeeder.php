<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'user_id' => 1,
            'restaurant_id' => 1,
            'rating' => 4,
            'comment' => 'Cukup murah',
        ]);

        DB::table('reviews')->insert([
            'user_id' => 1,
            'restaurant_id' => 2,
            'rating' => 4,
            'comment' => 'Cukup murah enak',
        ]);

        DB::table('reviews')->insert([
            'user_id' => 1,
            'restaurant_id' => 1,
            'rating' => 4,
            'comment' => 'Cukup murah so so',
        ]);
    }
}
