<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::paginate(12);
        return view('restaurant.index', ['restaurants' => $restaurant]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurant.show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
    public function search(Request $request)
    {
        // Retrieve the search query and filters from the request
        $searchQuery = $request->input('search');
        $ratingFilter = $request->input('rating');
        $startPriceFilter = $request->input('start_price');
        $ratingSort = $request->input('rating_sort');
        $priceSort = $request->input('price_sort');

        // Build the query builder instance
        $query = Restaurant::query();

        // Apply filters if provided
        if (!empty($searchQuery)) {
            $query->where('name', 'like', "%{$searchQuery}%");
        }

        if (!empty($ratingFilter)) {
            $query->where('rating', '>=', $ratingFilter);
        }

        if (!empty($startPriceFilter)) {
            $query->where('price_start', '>=', $startPriceFilter);
        }

        // Apply sorting
        if ($ratingSort === 'asc') {
            $query->orderBy('rating', 'asc');
        } elseif ($ratingSort === 'desc') {
            $query->orderBy('rating', 'desc');
        }

        if ($priceSort === 'asc') {
            $query->orderBy('price_start', 'asc');
        } elseif ($priceSort === 'desc') {
            $query->orderBy('price_start', 'desc');
        }

        // Perform the search query
        $restaurants = $query->orderByRaw("CASE WHEN rating = 0 THEN 1 ELSE 0 END, rating {$ratingSort}, price_start {$priceSort}")
            ->paginate(12);

        // Return the search results to the view

        return view('restaurant.index', ['restaurants' => $restaurants]);
    }
}
