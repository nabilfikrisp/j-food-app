<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PostsSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\ReviewsSeeder;
use Database\Seeders\RestaurantSeeder;
use Database\Seeders\ReviewImagesSeeder;
use Database\Seeders\ForumCategorySeeder;
use Database\Seeders\RestaurantImageSeeder;
use Database\Seeders\DiscussionThreadSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *  
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RestaurantSeeder::class,
            RestaurantImageSeeder::class,
            ReviewSeeder::class,
            ReviewImagesSeeder::class,
            PostsSeeder::class,
            DiscussionThreadSeeder::class,
            ForumCategorySeeder::class
        ]);
    }
}
