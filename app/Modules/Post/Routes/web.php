<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'post', 'middleware' => ['auth', 'admin']], function () {
    Route::delete('/{id}', 'PostController@destroy')->name('post.destroy');
});

Route::resource('post', 'PostController', [
    'middleware' => ['auth'],
    'except' => ['destroy']
]);

Route::group(['prefix' => 'like', 'middleware' => ['auth']], function () {
    Route::post('/', 'LikeController@store')->name('like.store');
    Route::delete('/{id}', 'LikeController@destroy')->name('like.destroy');
});

Route::group(['prefix' => 'comment', 'middleware' => ['auth']], function () {
    Route::post('/', 'CommentController@store')->name('comment.store');
});

