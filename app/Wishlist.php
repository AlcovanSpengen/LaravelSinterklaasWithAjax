<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = "lists";

    public function user()
    {
       return $this->belongsTo('App\User');
    }
    public function comments()
    {
       return $this->hasMany('App\Comment');
    }
}
