<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Tag extends Model
{
    protected $fillable = ['name'];
    public function posts(){
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

}
