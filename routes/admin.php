<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. 
| 
| These routes will redirect to given locations or maintain the route but
| display a reference to another route.
*/

Route::get('/', 'Admin\PortalController@index')->name('admin.portal');

// Season
Route::get('/season/generate', 'Admin\SeasonController@generate')->name('admin.season.generate');

// Users
Route::get('/users/permissions', 'Admin\UserController@permissions')->name('admin.users.permissions');
Route::get('/users/create', 'Admin\UserController@create')->name('admin.users.create');
Route::post('/users/create', 'Admin\UserController@store')->name('admin.users.store');

// Teams
Route::get('/teams/create', 'Admin\TeamController@create')->name('admin.teams.create');
Route::post('/teams/create', 'Admin\TeamController@store')->name('admin.teams.store');