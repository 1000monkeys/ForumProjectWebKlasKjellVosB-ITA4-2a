<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * One user possibly has one admin entry
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admin(){
        return $this->hasOne(Admin::class);
    }

    /**
     * One user possible has more than one thread
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads(){
        return $this->hasMany(Thread::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    /**
     * checks if current user is admin
     * @return bool
     */
    public static function isAdmin(){
        $isAdmin = Admin::find(Auth::id());
        return ($isAdmin != null);
    }

    /**
     * Record that the user has read the given thread.
     * @param Thread $thread
     */
    public function read($thread)
    {
        cache()->forever(
            $this->visitedThreadCacheKey($thread),
            Carbon::now()
        );
    }

    /**
     * Get the cache key for when a user reads a thread.
     * @param  Thread $thread
     * @return string
     */
    public function visitedThreadCacheKey($thread)
    {
        return sprintf("user.%s.visited.%s", $this->id, $thread->id);
    }
}
