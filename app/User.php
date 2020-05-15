<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'avatar', 'password',
    ];

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

    public function timeline()
    {
        $friends = $this->follows->pluck('id');
        $tweet = Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->with('user')
            ->latest()
            ->paginate(15);
        return $tweet;

        // return Tweet::where('user_id', $this->id)->latest()->get();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    
    // specify the attribute that passes through the route. In laravel 7 and
    // above it can be specified in right in route. See "profile" route

    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }

    public function getAvatarAttribute($value)
    {
        return asset('storage/' . ($value ?? 'avatars/default-avatar.png'));
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}
