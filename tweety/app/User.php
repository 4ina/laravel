<?php

namespace App;

use App\Traits\Follawable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Follawable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        if (!$value)
            $value = 'avatars/default.jpeg';
        return asset('storage/' . $value);
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');
        $tweets = Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->paginate(50);
        return $tweets;
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }
    public function path($append = '')
    {
        $path = route('profiles', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }
}
