<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function wishlist()
    {
       return $this->belongsTo('App\Wishlist');
    }
}
