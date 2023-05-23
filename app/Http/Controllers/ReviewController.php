<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Review_Images;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Check if the number of uploaded files exceeds the limit
        if ($request->hasFile('images') && count($request->file('images')) > 5) {
            return redirect()->back()->with('error', 'Mohon tidak mengunggah lebih dari 5 file.');
        }

        // Check if any of the uploaded images are too large
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->getSize() > 2048000) {
                    return redirect()->back()->with('error', 'Ukuran foto terlalu besar, maksimal 2Mb');
                }
            }
        }

        // Process the form data and save it to the database
        $review = new Review();
        $review->user_id = auth()->user()->id; // Assuming you have user authentication
        $review->restaurant_id = $request['restaurant_id']; // Replace $restaurantId with the actual ID of the restaurant
        $review->rating = $validatedData['rating'];
        $review->comment = $validatedData['comment'];
        $review->save();

        // Handle the uploaded images, if any
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('review_images', 'public');
                $reviewImage = new Review_Images();
                $reviewImage->review_id = $review->id;
                $reviewImage->url = $imagePath;
                $reviewImage->save();
            }
        }



        $averageRating = Review::where('restaurant_id', $request['restaurant_id'])->avg('rating');

        // Update the restaurant's rating
        $restaurant = Restaurant::find($request['restaurant_id']);
        $restaurant->rating = $averageRating;
        $restaurant->save();

        // Redirect the user or return a response
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
