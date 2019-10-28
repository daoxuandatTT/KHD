<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

   public function category(){
        return $this->belongsTo('App\Category');
    }

    public function materials(){
        return $this->hasMany('App\Material');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

}
