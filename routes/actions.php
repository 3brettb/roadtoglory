<?php

/*
|--------------------------------------------------------------------------
| Web Action Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| These routes are used in ajax requests
| These routes all have the prefix 'action'
|
*/

Route::post('/update/password', 'Action\UpdateController@password')->name('action.update.password');
Route::post('/update/profile', 'Action\UpdateController@profile')->name('action.update.profile');