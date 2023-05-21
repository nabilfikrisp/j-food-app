<?php

namespace App\Models;

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
        return $this->hasMany(Reviews::class);
    }

    public function restaurant_images(): HasMany
    {
        return $this->hasMany(Restaurant_Images::class);
    }

    public function getReviewsAttribute()
    {
        return Reviews::whereBelongsTo($this)->get();
    }

    public function getRestaurantImagesAttribute()
    {
        return Restaurant_Images::whereBelongsTo($this)->get();
    }
}
