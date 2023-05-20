<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $restaurants = $restaurants->only([1, 2, 3]);
        return view('landing-page', ['restaurants' => $restaurants]);
    }
}
