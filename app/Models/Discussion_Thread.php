<?php

namespace App\Models;

use App\Models\User;
use App\Models\Posts;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discussion_Thread extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $appends = ['comments', 'thread_images'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function forumCategory(): BelongsTo
    {
        return $this->belongsTo(Forum_Category::class);
    }

    public function thread_images(): HasMany
    {
        return $this->hasMany(Thread_Image::class);
    }

    public function getCommentsAttribute()
    {
        return Comment::whereBelongsTo($this)->get();
    }

    public function getThreadImagesAttribute()
    {
        return Thread_Image::whereBelongsTo($this)->get();
    }

    public function getLikesAttribute()
    {
        return Like::whereBelongsTo($this)->get();
    }
}
