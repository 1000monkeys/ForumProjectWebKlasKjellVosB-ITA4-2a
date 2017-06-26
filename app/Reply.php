<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['thread_id', 'user_id', 'body'];

    public function path(){
        return $this->thread->path()."#reply-".$this->id;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function thread(){
        return $this->belongsTo(Thread::class);
    }
}
