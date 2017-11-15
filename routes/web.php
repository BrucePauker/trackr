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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('account')->group(function() {
    Route::get('/', 'AccountController@index')->name('account_index');
});

Route::prefix('artist')->group(function() {
    Route::get('/view', 'ArtistController@view')->name('artist_view');
    Route::post('/add', 'ArtistController@add')->name('artist_add');
});

Route::prefix('artwork')->group(function() {
    Route::get('/view', 'ArtworkController@view')->name('artwork_view');
    Route::post('/add', 'ArtworkController@add')->name('artwork_add');
});
