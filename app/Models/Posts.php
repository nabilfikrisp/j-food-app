<?php

namespace App\Models;

use App\Models\User;
use App\Models\Discussion_Thread;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function discussion_threads(): BelongsTo
    {
        return $this->belongsTo(Discussion_Thread::class, 'thread_id');
    }
}
