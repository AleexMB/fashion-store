<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function() {

	Route::get('/get-t-shirts', [
		'uses' => 'v1\ProductController@getTshirts'
    ]);
    
    Route::get('/get-trousers', [
		'uses' => 'v1\ProductController@getTrousers'
    ]);
    
    Route::get('/get-coats', [
		'uses' => 'v1\ProductController@getCoats'
	]);

});
