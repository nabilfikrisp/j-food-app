<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Reviews;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Review_Images;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Discussion_Thread;

// use Illuminate\Foundation\Auth\User;

class TestController extends Controller
{
    public function test()
    {
        $user = User::find(1);

        $review = Review::find(1);

        $restaurant = Restaurant::find(1);

        $review_images = Review_Images::find(1);

        $comment = Comment::find(1);

        $discussion_thread = Discussion_Thread::find(1);
        
        dd($restaurant);
    }
}
