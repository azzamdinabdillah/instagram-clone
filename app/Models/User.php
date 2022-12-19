<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'phoneNumber',
        'bio',
        'email',
        'password',
    ];

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

    public function Posts()
    {
        return $this->hasMany(Posts::class);
    }

    public function likePosts()
    {
        return $this->belongsToMany(Posts::class, 'like_post_user', 'user_id', 'posts_id');
    }

    public function Comments()
    {
        return $this->hasMany(Comments::class, 'user_id');
    }

    public function Follows()
    {
        return $this->hasMany(Follow::class, 'user_id');
    }

    public function followUser()
    {
        return $this->belongsToMany('follow_users_details', 'user_id', 'follow_id');
    }
}
