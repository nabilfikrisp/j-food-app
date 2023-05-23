<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Restaurant_Images;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $restaurant = Restaurant::paginate(12);
        $restaurant_most_rated = Restaurant::orderBy('rating', 'desc')->take(10)->get();
        $restaurant_lowest_price = Restaurant::orderBy('price_start', 'asc')->take(10)->get();
        $restaurant_highest_price = Restaurant::orderBy('price_start', 'desc')->orderBy('rating', 'desc')->take(10)->get();
        return view('restaurant.index', [
            // 'restaurants' => $restaurant,
            'restaurants_most_rated' => $restaurant_most_rated,
            'restaurants_lowest_price' => $restaurant_lowest_price,
            'restaurants_highest_price' => $restaurant_highest_price,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validate the incoming request
        try {
            $requestData = $request->validate([
                'name' => 'required|string',
                'image' => 'nullable|image',
                'address' => 'required|string',
                'city' => 'required|string',
                'type' => 'required|string',
                'phone_number' => 'required|string',
                'social_media' => 'nullable|string',
                'price_start' => 'required|integer',
                'open_hours' => 'required|string',
                'non_tunai' => 'nullable',
                'restaurant_images' => 'nullable|array',
                'restaurant_images.*' => 'image',
                'latitude' => 'nullable|string',
                'longitude' => 'nullable|string',
            ]);

            $restaurant = new Restaurant();
            $restaurant->name = $requestData['name'];
            $restaurant->address = $requestData['address'];
            $restaurant->city = $requestData['city'];
            $restaurant->type = $requestData['type'];
            $restaurant->phone_number = $requestData['phone_number'];
            $restaurant->social_media = $requestData['social_media'] ?? '-';
            $restaurant->price_start = $requestData['price_start'];
            $restaurant->open_hours = $requestData['open_hours'];
            $restaurant->latitude = $requestData['latitude'];
            $restaurant->longitude = $requestData['longitude'];
            $restaurant->non_tunai = $request->has('non_tunai') ? true : false;
            $restaurant->save();

            // Handle restaurant image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('restaurant_display_image', 'public');
                $restaurant->image = $imagePath;
                $restaurant->save();
            }

            // Handle additional restaurant images
            if ($request->hasFile('restaurant_images')) {
                $images = $request->file('restaurant_images');
                foreach ($images as $image) {
                    $imagePath = $image->store('restaurant_images', 'public');
                    $restaurantImage = new Restaurant_Images();
                    $restaurantImage->restaurant_id = $restaurant->id;
                    $restaurantImage->url = $imagePath;
                    $restaurantImage->save();
                }
            }

            if ($request->hasFile('restaurant_menus')) {
                $images = $request->file('restaurant_menus');
                foreach ($images as $image) {
                    $imagePath = $image->store('restaurant_menus', 'public');
                    $restaurantImage = new Restaurant_Images();
                    $restaurantImage->restaurant_id = $restaurant->id;
                    $restaurantImage->type = 'menu';
                    $restaurantImage->url = $imagePath;
                    $restaurantImage->save();
                }
            }

            return redirect()->route('admin.restaurant.index')->with('success', 'Restaurant created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.restaurant.index')->with('error', 'Failed to create restaurant.' . $e->getMessage());
        }
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
        $searchQuery = $request->input('search');
        $ratingFilter = $request->input('rating');
        $startPriceFilter = $request->input('start_price');
        $ratingSort = $request->input('rating_sort');
        $priceSort = $request->input('price_sort');

        $query = Restaurant::query();

        if (!empty($searchQuery)) {
            $query->where('name', 'like', "%{$searchQuery}%");
        }

        if (!empty($ratingFilter)) {
            $query->where('rating', '>=', $ratingFilter);
        }

        if (!empty($startPriceFilter)) {
            $query->where('price_start', '>=', $startPriceFilter);
        }

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

        $restaurants = $query->orderByRaw("CASE WHEN rating = 0 THEN 1 ELSE 0 END, rating {$ratingSort}, price_start {$priceSort}")
            ->paginate(12);

        return view('restaurant.search', ['restaurants' => $restaurants]);
    }
}
