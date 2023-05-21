<?php

namespace App\Models;

use App\Models\User;
use App\Models\Restaurant;
use App\Models\Review_Images;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    protected $appends = ['review_images'];

    public function review_images(): HasMany
    {
        return $this->hasMany(Review_Images::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function getReviewImagesAttribute()
    {
        return Review_Images::whereBelongsTo($this)->get();
    }
}
