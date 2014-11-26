<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return Hash::make('123456');
// });

Route::get('/', 'HomeController@showWelcome')->before('auth.basic');
Route::post('/', ['as' => 'store.credentials', 'uses' => 'HomeController@storeGuests'])->before('auth.basic');
Route::get('/guests', 'HomeController@getGuests')->before('auth.basic');