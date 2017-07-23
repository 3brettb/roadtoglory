<?php

/*
|--------------------------------------------------------------------------
| Alias Routes
|--------------------------------------------------------------------------
|
| Here is where you can register alias routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. 
| 
| These routes will redirect to given locations or maintain the route but
| display a reference to another route.
*/

Route::get('/home', function(){
    return Redirect::to('/dashboard');
})->name('home');

Route::get('/', function(){
    return Redirect::to('/dashboard');
});

Route::get('/schedule', function(){
    return Redirect::to('/matchup');
})->name('schedule');