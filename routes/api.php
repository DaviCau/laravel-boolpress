<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')
    ->group(function() {

        Route::get('posts', 'PostController@index');
        Route::get('posts/{slug}', 'PostController@show');
        Route::get('categories/{slug}', 'CategoryController@show');
        Route::get('tags/{slug}', 'TagController@show');
        Route::get('categories', 'CategoryController@index');

        Route::post('leads', 'LeedController@store');

    });
