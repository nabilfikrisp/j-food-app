<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Reviews;
use App\Models\Restaurant_Images;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    protected $appends = ['reviews', 'restaurant_images'];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function restaurant_images(): HasMany
    {
        return $this->hasMany(Restaurant_Images::class);
    }

    public function getReviewsAttribute()
    {
        return Review::whereBelongsTo($this)->get();
    }

    public function getRestaurantImagesAttribute()
    {
        return Restaurant_Images::whereBelongsTo($this)->get();
    }
}
