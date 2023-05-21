<?php

namespace App\Models;

use App\Models\Discussion_Thread;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum_Category extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $appends = ['discussion_threads'];

    public function discussion_threads(): HasMany
    {
        return $this->hasMany(Discussion_Thread::class);
    }

    public function getDiscussionThreadsAttribute()
    {
        return Discussion_Thread::whereBelongsTo($this)->get();
    }
}
