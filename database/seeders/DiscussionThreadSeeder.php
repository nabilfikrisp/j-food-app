<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscussionThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discussion__threads')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Restoran A di jalan cinta',
            'body' => 'Kalian harus banget coba restoran A di jalan cinta!!!'
        ]);
    }
}
