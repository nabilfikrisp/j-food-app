<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ForumCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forum__categories')->insert([
            'name' => 'Tempat Trending'
        ]);
        DB::table('forum__categories')->insert([
            'name' => 'Viral'
        ]);
        DB::table('forum__categories')->insert([
            'name' => 'Murah'
        ]);
    }
}
