<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thread_Image extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function discussionThread(): BelongsTo
    {
        return $this->belongsTo(Discussion_Thread::class, 'discussion_thread_id');
    }
}
