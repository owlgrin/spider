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

// Route::get('/password', function()
// {
// 	return Hash::make('sarpal');
// });

// Route::get('/', 'HomeController@showWelcome');
// Route::get('/', 'HomeController@showWelcome')->before('auth.basic');
// Route::post('/', ['as' => 'store.credentials', 'uses' => 'HomeController@storeCredentials'])->before('auth.basic');
// Route::get('/clients', 'HomeController@getCredentials')->before('auth.basic');
Route::get('/', 'HomeController@showWelcome');
Route::post('/', ['as' => 'store.credentials', 'uses' => 'HomeController@storeGuests']);
Route::get('/guests', 'HomeController@getGuests');