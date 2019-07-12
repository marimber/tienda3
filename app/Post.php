<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class Post extends Moloquent
{
    protected $fillable =[
        'title', 'img', 'tags'
    ];
    //

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->embedsMany('App\Comment');
    }
}
