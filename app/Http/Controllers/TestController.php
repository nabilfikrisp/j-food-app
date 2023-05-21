<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reviews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\User;

class TestController extends Controller
{
    public function test()
    {
        $user = User::find(1);
        
        dd($user);
    }
}
