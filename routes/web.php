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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', 'HomeController@dashboard');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/dashboard/t-shirts', 'TshirtController');

Route::resource('/dashboard/trousers', 'TrousersController');

Route::resource('/dashboard/coats', 'CoatController');



Route::get('/dashboard/t-shirts/{ref_id}/show', 'TshirtController@show');

Route::get('/dashboard/trousers/{ref_id}/show', 'TrousersController@show');

Route::get('/dashboard/coats/{ref_id}/show', 'CoatController@show');