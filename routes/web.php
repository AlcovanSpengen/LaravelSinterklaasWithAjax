<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@getIndex');

Route::get('about', 'PageController@getAbout');

Route::get('contact', 'PageController@getContact');

Route::resource('lists', 'ListController');

//overview wishlists
Route::get('blog', 'BlogController@getIndex');

Route::get('blog/{id}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);

//comments
Route::post('comments/{list_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);

Auth::routes();

Route::apiResource('api/ads', 'API\AdController');

Route::get('/getRequest', function(){
    if(Request::ajax()){
        return 'getRequest has loaded completely.';
    }
});

Route::post('/registernow', function(){
    if(Request::ajax()){
        return var_dump(Response::json(Request::all()));
    }
});
