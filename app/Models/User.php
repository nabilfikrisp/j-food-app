<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Posts;
use App\Models\Review;
use App\Models\Comment;
use App\Models\Reviews;
use App\Models\Discussion_Thread;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'username',
    //     'email',
    //     'password',
    // ];

    protected $guarded = [
        'id'
    ];

    protected $appends = ['reviews', 'discussion_threads'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Likes::class);
    }

    public function discussion_threads(): HasMany
    {
        return $this->hasMany(Discussion_Thread::class);
    }

    public function getReviewsAttribute()
    {
        return Review::whereBelongsTo($this)->get();
    }

    public function getDiscussionThreadsAttribute()
    {
        return Discussion_Thread::whereBelongsTo($this)->get();
    }
}
