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

    protected $appends = ['comments'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function forum_category(): BelongsTo
    {
        return $this->belongsTo(Forum_Category::class);
    }

    public function getCommentsAttribute()
    {
        return Comment::whereBelongsTo($this)->get();
    }
}
