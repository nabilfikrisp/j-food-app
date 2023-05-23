<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function restaurantsIndex()
    {
        $restaurant = Restaurant::paginate(50);
        return view('admin.restaurant.index', ['restaurants' => $restaurant]);
    }
}
