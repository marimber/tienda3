<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class Comment extends Moloquent
{
    protected $fillable = [
        'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    //
}
