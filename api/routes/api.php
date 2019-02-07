<?php

Route::middleware('api', 'throttle:60,1')->prefix('api')->group(function () {

    Route::middleware('jwt.auth')->group(function () {

        Route::get('/search/{q?}', 'Api\Controllers\ProductController@index');
        Route::get('/logout', 'Api\Controllers\LoginController@logout');
    });

    Route::post('/register', 'Api\Controllers\RegisterController@register');
    Route::post('/login', 'Api\Controllers\LoginController@login');

});

