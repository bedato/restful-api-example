<?php

declare (strict_types = 1);

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api'], function () {
    Route::post('login', 'LoginController@login');

    Route::post('users', 'UsersController@store');

    Route::get('posts', 'PostsController@index');
    Route::post('posts', 'PostsController@store');
    Route::delete('posts/{id}', 'PostsController@destroy');

    Route::group(['prefix' => 'users'], function () {
        Route::get('', 'UsersController@index')->middleware('user');
        Route::delete('users/{id}', 'UsersController@destroy');
        Route::post('login', 'LoginController@login');
    });

});
