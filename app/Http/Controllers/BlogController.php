<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;

class BlogController extends Controller
{
    public function getIndex() 
    {
        $wishlists = Wishlist::orderBy('created_at', 'desc')->paginate(10);

        return view('blog.index')->withWishlists($wishlists);
    }
    public function getSingle($id) 
    {
        $wishlist = Wishlist::where('id', '=', $id)->first();

        return view('blog.single')->withWishlist($wishlist);
    }
}
